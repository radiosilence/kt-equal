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
		
		if( $sth->rowCount() == 1 )
		{
			$res = $sth->fetch();
			$this->load( $res[ "id" ] );
			return 1;		
		}
		else
		{
			return 0;
		}
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
		
		return $sth->fetchAll( PDO::FETCH_ASSOC );
		
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
			"title"		=> $t->char_field	( "Title" ),
			"name"		=> $t->char_field	( "Name" ),
			"image"		=> $t->char_field	( "Section Introduction Image URL" ),
			"introduction"	=> $t->text_field	( "Introduction Box Text" )
		));
	}
	
	public function default_form()
	{
		return array(
			"Section" => array(
				"title" => "title",
				"name",
				"image",
				"introduction"
		));
	}
}

?>