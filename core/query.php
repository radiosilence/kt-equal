<?php
/**
 * This contains the query class.
 *
 * It enables building of sql statements through
 * fluent interfacing, and thus meaning there is
 * no need for SQL in the PHP.
 *
 * @author James Cleveland
 * @package database
 * @subpackage core
 * @copyright 2009
 */
/**
 * Query Maker
 *
 * SQL qeneration through fluent interfaces.
 *
 * @todo Adding CREATE TABLE functionality.
 * @todo Adding DELETE functionality.
 * @todo (Long Term) Adding nested selections.
 */
class query
{
	private $where_clauses;
	private $insert_clauses;
	private $set_statements;
	private $queryType;
	private $header;
	private $footer;
	private $db = 0;
	public $string;
	public $prefix;

	public function __construct( $db )
	{
		$this->db = $db;
	}

	public function __toString()
	{
		$this->string = $this->header;

		switch( $this->queryType )
		{
			case 'select':
				$this->string .= $this->where_clauses();
				break;
			case 'insert':
				$this->string .= $this->values_clauses();
				break;
			case 'update':
				$this->string .= $this->set_statements();
				$this->string .= $this->where_clauses();
				break;
		}

		$this->string .= $this->footer;
		return $this->string;
	}

	/**
	 * database::select()
	 *
	 * @return mixed SELECT
	 */
	public function select( $fields = 0 )
	{
		$this->queryType = 'select';

		if( func_num_args() == 0 || !$fields )
		{
			$input = array ( "*" );
		}
		else if( is_array( $fields ))
		{
			$input = $fields;
		}	
		else
		{
			$input = func_get_args();

			foreach( $input as $k => $v )
			{

				if( ! is_int( $k ) )
				{
					$input[ $k ] = $this->backtickify( $k ) . ' as ' . '`' . $v . '`';
				}
				else
				{

					if( strpos( $v, '*' ) !== false )
					{
						$tmp = explode( '.', $input[ $k ] );
						$input[ $k ] = '`' . $tmp[ 0 ] . '`.*';
					}
					else
					{
						$input[ $k ] = $v;
					}

				}

			}

		}

		$this->header .= 'SELECT ' . implode( ', ', $input );
		return $this;
	}

	public function delete()
	{
		$this->queryType = 'select';

		if( func_num_args() == 0 )
		{
			$input = null;
		}
		else
		{
			$input = func_get_args();

			foreach( $input as $k => $v )
			{

				if( ! is_int( $k ) )
				{
					$input[ $k ] = $this->backtickify( $k ) . ' as ' . '`' . $v . '`';
				}
				else
				{

					if( strpos( $v, '*' ) !== false )
					{
						$tmp = explode( '.', $input[ $k ] );
						$input[ $k ] = '`' . $tmp[ 0 ] . '`.*';
					}
					else
					{
						$input[ $k ] = $v;
					}

				}

			}

			$input = implode( ', ', $input );
		}

		$this->header .= 'DELETE ' . $input;

		return $this;
	}

	public function insert( $table, $fields )
	{
		$this->queryType = 'insert';
		$this->header 	.= 'INSERT INTO `' . $table . '` (`' . implode( '`, `', $fields ) . '`)';

		return $this;
	}

	public function update( $table )
	{
		$this->queryType = 'update';
		$this->header 	 = 'UPDATE ' .  $table;

		return $this;
	}

	public function limit( $limit, $start = false )
	{
		$this->footer .= ' LIMIT ' . $limit;

		return $this;
	}

	public function order( $input, $order = 'ASC' )
	{
		if( $input )
		{
			if( ! is_array( $input ) )
			{
				$input = array (
						$input
				);
			}
			$this->footer .= ' ORDER BY ' . implode( ', ', $input ) . ' ' . $order;
		}

		return $this;
	}

	public function set( $fields, $values, $escape = true )
	{

		if( ! is_array( $fields ) )
		{
			$fields = array (
					$fields
			);
		}

		if( ! is_array( $values ) )
		{
			$values = array (
					$values
			);
		}

		foreach( $fields as $k => $v )
		{
			$this->add_set_statement( $v, $values[ $k ], $escape );
		}

		return $this;
	}

	public function values( $values, $escape = true )
	{
		$this->add_values_clause( $values, $escape = true );
		return $this;
	}

	public function from( $input )
	{

		if( ! is_array( $input ) )
		{
			$input = array ( $input	);
		}

		foreach( $input as $k => $v )
		{
			$input[ $k ] = $v;
		}

		$this->header .= ' FROM ' . implode( ',', $input );
		return $this;
	}

	public function where( $field, $value, $type = "=", $escape = true )
	{

		if( is_array( $value ) )
		{
			$type = "in";
		}

		$this->add_where_clause( $field, $value, $type, $escape );
		return $this;
	}

	public function left_join( $table, $first, $second )
	{
		$this->header .= ' LEFT JOIN ' . $table . ' ON ' . $first . ' = ' . $second . ' ';
		return $this;
	}

	private function add_where_clause( $field, $values, $type, $escape )
	{
		// You should give your query a database if you want it to escape things.
		$db = $this->db;

		if( $type == "in" )
		{
			foreach( $values as $k => $v )
			{
				$values[ $k ] = $v == "?" ? "?" : "'"
					. $db->real_escape_string( $v )
					. "'";
			}
			$this->where_clauses[] = $field . " IN (" . implode( ",", $values ). ") ";
		}
		else if( (string)$values == "?" )
		{
			$this->where_clauses[] = $field . " " . $type . " ? ";
		}
		else
		{
			$this->where_clauses[] = $field . " " . $type . " ". ( $escape ? "'"
				. $db->real_escape_string( $values ) . "' " : $values );
		}

	}

	private function where_clauses()
	{
		if( is_array( $this->where_clauses ) )
		{
			$return = null;
			foreach( $this->where_clauses as $k => $v )
			{
				$return .= ( $k == 0 ? " WHERE " : " AND " ) . $v;
			}
		}

		return $return;
	}

	private function add_values_clause( $values, $escape )
	{
		$db = $this->db;

		foreach( $values as $k => $v )
		{
			$values[ $k ] = $v == "?" ? "?" : ( $escape ? "'"
				. $db->real_escape_string( $v )
				. "'" : $v );
		}

		$this->values_clauses[] = "(" . implode( ",", $values ) . ")";
	}

	private function values_clauses()
	{

		if( is_array( $this->values_clauses ) )
		{
			return " VALUES " . implode( ",\n", $this->values_clauses );
		}

	}

	private function add_set_statement( $field, $values, $escape )
	{
		$db = $this->db;
		if( (string)$values == "?" )
		{
			$this->set_statements[] = $field . " = ? ";
		}
		else
		{
			$this->set_statements[] = $field . " = ". ( $escape ? "'"
				. $db->real_escape_string( $values ) . "' " : $values );
		}

	}

	private function set_statements()
	{

		if( is_array( $this->set_statements ) )
		{
			return " SET " . implode(", \n", $this->set_statements );
		}

	}
}
?>