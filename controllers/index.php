<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$db 		= $this->database();
		$articles 	= array();
		$sth = $db->prepare( "
			SELECT		id, title, body, date_added, author, publisher, date
			FROM		articles
			ORDER BY	date_added DESC
			LIMIT		5
		" );
		
		$sth->execute();
		while( $article = $sth->fetch() )
		{
			$seo_url = new seo_url( $article );
			$s = new markdown_smartypantstypographer();
			$articles[] = array(
				"id"		=> $article[ "id" ],
				"title" 	=> $article[ "title" ],
				"excerpt" 	=> $s->transform ( substr( $article[ "body" ], 0, 200 ) ). "&hellip;",
				"seo_url" 	=> $seo_url->url,
				"date_added"	=> date( "dS M", strtotime( $article[ "date_added" ] )),
				"author"	=> $article[ "author" ],
				"publisher"	=> $article[ "publisher" ],
				"date"		=> $article[ "date" ]
			);
		}
		$template = new view( $this->registry );
		
		$template->set( "articles", $articles );
		$template->set( "page_title", "Look At That F***ing Title" );
		$template->set( "subview", "home_body" );
		$template->show( "home" );
	}
}
?>