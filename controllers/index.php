<?php

class controller_index extends controller
{
	public function index( $args )
	{
		$db 	= $this->database();

		$s 	= new model_section( $db );
		$p	= new model_page( $db );
		$md 	= new markdown_parser();
		
		$rt 	= explode( "/", $args[ "_url" ] );
		
		$s->load_from_name( strlen( $rt[ 0 ] ) > 0 ? $rt[ 0 ] : "home" );
		
		array_shift( $rt );
		$rt = implode( "/", $rt );
		
		$p->load_from_url( strlen( $rt ) > 0 ? $args[ "_url" ] : $s->default_page() );
		
			
		$navs = array( 
			"home" 		=> "Home",
			"about-us" 	=> "About Us",
			"projects" 	=> "Projects",
			"get-involved" 	=> "Get Involved",
			"help" 		=> "Help",
		);
		
		$subnavs = $s->get_pages();
		
		$tpl = new view( $this->registry );
		$tpl->set( "title", $p->title );
		$tpl->set( "navs", $navs );
		$tpl->set( "subnavs", $subnavs );
		$tpl->set( "page", $s->name );
		$tpl->set( "content", $p->is_markdown ? array( "markdown" => $md->transform( $p->content )) : array( "html" => $p->content ));
		$tpl->set( "s_intro", $md->transform( $s->introduction ));
		$tpl->set( "s_img", $s->image );
		$tpl->show( "default" );
	}
}
?>