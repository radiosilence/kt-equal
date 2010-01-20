<?php

class model_article extends model
{
	public function __construct( $db, $id = 0 )
	{
		$this->db = $db;
		$this->define();
		
		if( $id > 0 )
		{
			$this->load( $id );
		}	
	}
	
	
	public static function get_articles( $db, $articles = 0 )
	{
		if( is_array( $articles ) )
		{
			foreach( $articles as $k => $v )
			{
				$extra_sql[] = ":id" . $k;
			}

			$extra_sql = implode( ", ", $extra_sql );
		}

		$sql = "
			SELECT 	*
			FROM	articles "
			. ( $extra_sql ? "WHERE id IN( " . $extra_sql . " ) " : null )
			. "LIMIT 100";
		$sth = $db->prepare( $sql );
		
		if( is_array( $articles ) )
		{
			foreach( $articles as $k => $v )
			{
				$sth->bindValue( ":id" . $k, $v );
			}
		}
		
		$sth->execute();
		return $sth->fetchAll();
	}
	
	protected function define()
	{
		$t 			= $this;
		$t->_model_name		= "article";
		$t->_nice_name		= "Article";
		$t->_primary_table	= "articles";
		$t->_primary_key	= "articles.id";
		
		$t->table( "articles", array(
			"id"		=> $t->primary_key	(),
			"title"		=> $t->char_field	( "Title" ),
			"body"		=> $t->text_field	( "Article Body" ),
			"author"	=> $t->char_field	( "Author(s)" ),
			"date"		=> $t->char_field	( "Year Published", array( "length" => 12 )),
			"publisher"	=> $t->char_field	( "Publisher" ),
			"date_added"	=> $t->datetime_field	( "Date Added" )
		));
	}
	
	public function default_form()
	{
		return array(
			"Article" => array(
				"title" => "title",
				"body",
				"author",
				"date",
				"publisher",
				"date_added"
		));
	}
}	
?>