<?php

class controller_projects extends controller
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
	
		if( $args[ "article" ] )
		{
			# Loading and displaying an article.
			$a = new model_article( $db, $args[ "article" ] );
			
			$tpl->set( "content", array( "markdown" => $md->transform( $a->body ) ) );
			$tpl->set( "title", $a->title );
		}
		else
		{
			# Listing articles.
			switch( $args[ "_url" ] )
			{
				case "projects/other.html":
					$listed = array(
						8,
						9,
						14,
					);
					$subtitle = "Other";
					break;
				default:
					$listed = array(
						13,
						12,
						11,
						10,
						15,
						16,
						17,
					);
					$subtitle = "KT-EQUAL";
					break;
			}
			
			$projects = array();
			$projects = MODEL_ARTICLE::get_articles( $db, $listed );
			
			$tpl->set( "include", "subviews/project_list.php" );
			$tpl->set( "projects", $projects );
			$tpl->set( "title", $subtitle . " Projects" );
		
		}
		
		$tpl->set( "cur_url", $cur_url );
		$tpl->set( "navs", $navs );
		$tpl->set( "subnavs", $subnavs );
		$tpl->set( "page", $s->name );
		$tpl->set( "s_intro", $md->transform( $s->introduction ));
		$tpl->set( "s_img", $s->image );
		$tpl->show( "default" );
	}
}
?>