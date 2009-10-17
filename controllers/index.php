<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$template = new view( $this->registry );
		$template->show( "home" );
	}
}
?>