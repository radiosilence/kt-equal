<?php

class model_section extends model
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
	
	public function load_from_name( $name )
	{
		$db = $this->db;
		
		$sth = $db->prepare( "
			SELECT 	id
			FROM	sections
			WHERE	name = :name
			LIMIT	1
		" );
		
		$sth->execute( array(
			":name" => $name
		));
		
		return $sth->fetch();
	}
	
	public function list_pages()
	{
		$db = $this->db;
		
		$sth = $db->prepare( "
			SELECT 		title, url
			FROM		pages
			WHERE		section = :id
			ORDER BY	pages.order ASC
		" );
		
		$sth->execute( array(
			":id" => $this->_id
		));
		
		return $sth->fetchAll();
		
	}
	
	protected function define()
	{
		$t = $this;
		
		$t->_model_name 	= "section";
		$t->_nice_name 		= "Section";
		
		$t->_primary_table 	= "sections";
		$t->_primary_key 	= "sections.id";
		
		$t->table( "sections", array(
			"id"		=> $t->primary_key	(),
			"title"		=> $t->char_field	(),
			"name"		=> $t->char_field	(),
			"image"		=> $t->char_field	(),
			"introduction"	=> $t->text_field	()
		));
	}
}

?>