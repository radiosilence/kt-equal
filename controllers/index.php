<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$navs = array( 
			"home" 		=> "Home",
			"about_us" 	=> "About Us",
			"projects" 	=> "Projects",
			"get_involved" 	=> "Get Involved",
			"help" 		=> "Help",
		);
		
		$subnavs = array( "temp" => "Temp", "hi" => "Hi" );

		$tpl = new view( $this->registry );
		$tpl->set( "title", "KT-EQUAL" );
		$tpl->set( "navs", $navs );
		$tpl->set( "subnavs", $subnavs );
		$tpl->set( "page", "about_us" );
		$tpl->set( "subview", "home_body" );
		$tpl->show( "default" );
	}
}
?>