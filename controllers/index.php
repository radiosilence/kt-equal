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
				"excerpt" 	=> $s->transform (utf8_encode( substr( $article[ "body" ], 0, 200 ) )). "&hellip;",
				"seo_url" 	=> $seo_url->url,
				"date_added"	=> date( "dS M", strtotime( $article[ "date_added" ] )),
				"author"	=> $article[ "author" ],
				"publisher"	=> $article[ "publisher" ],
				"date"		=> $article[ "date" ]
			);
		}
		
		$tpl = new view( $this->registry );
		$tpl->set( "articles", $articles );
		$tpl->set( "page_title", "Look At That F***ing Title" );
		$tpl->set( "subview", "home_body" );
		$tpl->show( "home" );
	}
}
?>