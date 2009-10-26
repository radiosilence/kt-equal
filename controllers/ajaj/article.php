<?php
class controller_ajaj_article extends controller
{
	public function index( $args )
	{
		die( "No Action." );
	}
	public function search( $args )
	{
		$results = array();
		if( strlen( $args[ "q" ] ) <= 0 )
		{
			echo json_encode( $results );
			return 0;
		}
		
		$char_lim = 400;
		$clr = $char_lim / 2;
		
		$db = $this->database();
		$sth = $db->prepare( "
			SELECT 	id,title, body
			FROM	articles
			WHERE	body LIKE :string
			OR 	title LIKE :string
			LIMIT 	20
		");
		$term = strtolower( $args[ "q" ] );
		$search = "%".$term."%";
		$sth->execute( array( ":string" => $search ) );
//		$sth->debugDumpParams();
		foreach( $sth->fetchAll() as $subject )
		if( preg_match( '/(.{0,' . $clr . '})(' . $term . ')(.{0,' . $clr . '})/mi', $subject[ "title" ], $regs ) )
		{
			$title = utf8_encode( htmlentities( ltrim( $regs[ 1 ] ) ) )
				. "<span class=\"title_term\">" . $regs[ 2 ] . "</span>"
				. utf8_encode( htmlentities( rtrim( $regs[ 3 ] ) ) );
			$titles[] = array(
				"id"		=> $subject[ "id" ],
				"title" 	=> $title,
				"excerpt"	=> "",
			);
		}
		else if( preg_match( '/(.{0,' . $clr . '})(' . $term . ')(.{0,' . $clr . '})/mi', $subject[ "body" ], $regs ) )
		{
			$excerpt = utf8_encode( htmlentities( ltrim( $regs[ 1 ] ) ) )
				. "<span class=\"term\">" . $regs[ 2 ] . "</span>"
				. utf8_encode( htmlentities( rtrim( $regs[ 3 ] ) ) . "&hellip;" );
			
			$results[] = array(
				"id"		=> $subject[ "id" ],
				"title" 	=> $subject[ "title" ],
				"excerpt" 	=> $excerpt
			);
		}
		if( is_array( $titles ))
		{
			$results = array_merge( $titles, $results );
		}
/*		echo "<style>.term { font-weight: bold }</style><pre>";
		print_r( $results );
		echo "</pre>";*/
		echo json_encode( $results );
	}
}
?>