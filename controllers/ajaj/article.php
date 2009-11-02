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
		
		$char_lim = 100;
		$clr = $char_lim / 2;
		
		$db = $this->database();
		
		$term = strtolower( $args[ "q" ] );
		
		if( QUICK_SEARCH )
		{
			$sth = $db->prepare( "
				SELECT 	id, title, body, MATCH(title, body) AGAINST(:string) AS score
				FROM	articles
				WHERE	MATCH(title, body) AGAINST (:string IN BOOLEAN MODE)
				ORDER 	BY score DESC 
				LIMIT 	10
			");
			$search = $term;
		}
		else
		{
			$sth = $db->prepare( "
				SELECT 	id, title, body
				FROM	articles
				WHERE	title LIKE :string
				OR	body LIKE :string
				LIMIT 	10
			");
			$search = "%" . $term . "%";
		}
		
		$sth->execute( array( ":string" => $search ) );

		foreach( $sth->fetchAll() as $subject )
		{
			$seo_url = new seo_url( $subject );
			if( preg_match( '/(.{0,' . $clr . '})(' . $term . ')(.{0,' . $clr . '})/mi', $subject[ "title" ], $regs ) )
			{
				$title = utf8_encode( htmlentities( ltrim( $regs[ 1 ] ) ) )
					. "<span class=\"title_term\">" . $regs[ 2 ] . "</span>"
					. utf8_encode( htmlentities( rtrim( $regs[ 3 ] ) ) );
				$titles[] = array(
					"id"		=> $subject[ "id" ],
					"title" 	=> $title,
					"excerpt"	=> "",
					"seo_url"	=> $seo_url->url,
				);
			}
			else if( preg_match( '/(.{0,' . $clr . '})(' . $term . ')(.{0,' . $clr . '})/mi', $subject[ "body" ], $regs ) )
			{
				$excerpt = utf8_encode( "&hellip;" . htmlentities( ltrim( $regs[ 1 ] ) ) )
					. "<span class=\"term\">" . $regs[ 2 ] . "</span>"
					. utf8_encode( htmlentities( rtrim( $regs[ 3 ] ) ) . "&hellip;" );
				
				$results[] = array(
					"id"		=> $subject[ "id" ],
					"title" 	=> $subject[ "title" ],
					"excerpt" 	=> $excerpt,
					"seo_url"	=> $seo_url->url,
				);
			}
			else
			{
				$results[] = array( 
					"id"		=> $subject[ "id" ],
					"title"		=> $subject[ "title" ],
					"seo_url"	=> $seo_url->url,
				);
			}
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