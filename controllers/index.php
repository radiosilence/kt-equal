<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$template = new view( $this->registry );
		$template->set( "page_title", "HCI Project 1" );
		$template->set( "title", "Home Page" );
		$template->set( "body", "<p>Blahblahblah blaaah lbah blah</p>" );
		$template->show( "home" );
	}
}
?>