<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$template = new view( $this->registry );
		$template->set( "title", "HCI Project 1" );
		$template->set( "body", "Blahblahblah blaaah lbah blah" );
		$template->show( "home" );
	}
}
?>