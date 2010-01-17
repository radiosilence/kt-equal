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
			"title"		=> $t->char_field	(),
			"url"		=> $t->char_field	(),
			"content"	=> $t->text_field	(),
			"last_modified"	=> $t->datetime_field	(),
			"order"		=> $t->integer_field	(),
			"layout"	=> $t->char_field	()
		));
	}
}

?>