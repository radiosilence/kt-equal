<?php
class controller_index extends controller
{
	public function index( $args )
	{
		$db = $this->database();

		$s = new model_section( $db );
		
		$rt = explode( "/", $args[ "_url" ] );
		
		$s->load_from_name( strlen( $rt[ 0 ] ) > 0 ? $rt[ 0 ] : "home" );
				
		$navs = array( 
			"home" 		=> "Home",
			"about-us" 	=> "About Us",
			"projects" 	=> "Projects",
			"get-involved" 	=> "Get Involved",
			"help" 		=> "Help",
		);
		
		$subnavs = $s->list_pages();
		
		$md = new markdown_parser();
		
		$tpl = new view( $this->registry );
		$tpl->set( "title", "KT-EQUAL" );
		$tpl->set( "navs", $navs );
		$tpl->set( "subnavs", $subnavs );
		$tpl->set( "page", $s->name );
		$tpl->set( "s_intro", $md->transform( $s->introduction ));
		$tpl->set( "s_img", $s->image );
		$tpl->set( "subview", "home_body" );
		$tpl->show( "default" );
	}
}
?>