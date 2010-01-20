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
		
		$cur_url = strlen( $rt ) > 0 ? $args[ "_url" ] : $s->default_page();
		
		$p->load_from_url( $cur_url );
		
		$navs = MODEL_SECTION::get_sections( $db );
		
		$subnavs = $s->get_pages();
		
		$tpl = new view( $this->registry );
		$tpl->set( "cur_url", $cur_url );
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