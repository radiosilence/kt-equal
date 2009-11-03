<?php
class controller_article extends controller
{
	public function index( $args )
	{
		print_r( $args );
	}
	public function view( $args )
	{
		$template = new view( $this->registry );
		$db = $this->database();
		$sth = $db->prepare( "
			SELECT 	id, title, body, author, date, publisher
			FROM 	articles
			WHERE	id = :id
			LIMIT 	1
		" );
		
		$sth->execute( array( ":id" => $args[ "id" ] ) );
		
		$article = $sth->fetch();
		$template->set( "page_title", "Look At That F***ing Title" );
		$template->set( "title", utf8_encode( $article[ "title" ] ));
		$p = new markdown_parser;
		$s = new markdown_smartypantstypographer;
		include( SITE_ROOT . DSEP . "definitions" . DSEP . "article.php" );
		
		$body_text = $p->transform( $s->transform( $article[ "body" ] ) );
		$article_info = sprintf( HTML_ARTICLE_INFO, $article[ "author" ], $article[ "date" ], $article[ "publisher" ] );
		$template->set( "info", $article_info );
		$template->set( "body", utf8_encode( sprintf( HTML_ARTICLE_BODY, $body_text ) ) );
		
		$template->show( "home" );
	}
}