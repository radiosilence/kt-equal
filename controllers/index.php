<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$tpl = new view( $this->registry );
		$tpl->set( "title", "KT-EQUAL" );
		$tpl->set( "subview", "home_body" );
		$tpl->show( "default" );
	}
}
?>