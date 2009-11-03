<?php
class controller_editor extends controller
{
	public function index( $args )
	{
		$template 	= new view( $this->registry );
		$db 		= $this->database();
		
		MODEL::set_db( $db );
		$a = MODEL::create( "article", $args[ "id" ] );
		
		$form = new model_form( $a, "editor/s:1/id:" . $args[ "id" ], $args[ "id" ] );
		
		if( $args[ "s" ] == 1 )
		{
			$form->populate( $_POST );
			$form->save_all();
		}
		
		$template->set( "form", $form->output() );
		$template->set( "page_title", "Look at that F***ing Rails Copy" );
		$template->set( "title", "Editorizing" );
		$template->set( "subview", "editor" );
		$template->show( "home" );
	}
}

?>