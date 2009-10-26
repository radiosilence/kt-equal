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
			SELECT 	id, title, body
			FROM 	articles
			WHERE	id = :id
			LIMIT 	1
		" );
		
		$sth->execute( array( ":id" => $args[ "id" ] ) );
		
		$article = $sth->fetch();
		$template->set( "title", utf8_encode( $article[ "title" ] ));
		$template->set( "body", nl2br( utf8_encode( $article[ "body" ] )));
		
		$template->show( "article" );
	}
}