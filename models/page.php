<?php

class model_page extends model
{
	public function __construct( $db, $id = 0 )
	{
		$this->db = $db;
		$this->define();
		
		if( $id > 0 )
		{
			$this->load( $id );
		}	
	}
	
	protected function define()
	{
		$t = $this;
		
		$t->_model_name		= "page";
		$t->_nice_name		= "Page";
		
		$t->_primary_table	= "pages";
		$t->_primary_key	= "pages.id";
		
		$t->table( "pages", array(
			"id"		=> $t->primary_key	(),
			"section"	=> $t->foreign_key	( "Section ID", "section", "select" ),
			"title"		=> $t->char_field	( "Title" ),
			"url"		=> $t->char_field	( "URL" ),
			"content"	=> $t->text_field	( "Optional Content" ),
			"last_modified"	=> $t->datetime_field	( "Date of Last Modification" ),
			"order"		=> $t->integer_field	( "Menu Order" ),
		));
	}
}

?>