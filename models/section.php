<?php

class model_section extends model
{
	public $pages = array();
	
	public function __construct( $db, $id = 0 )
	{
		$this->db = $db;
		$this->define();
		
		if( $id > 0 )
		{
			$this->load( $id );
		}
	}
	
	public function default_page()
	{
		$this->get_pages();
		return $this->pages[0][ "url" ];
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
	
	public function get_pages()
	{
		if( count( $this->pages == 0 ) )
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
			
			$this->pages = $sth->fetchAll( PDO::FETCH_ASSOC );
		}
		
		return $this->pages;
		
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
			"introduction"	=> $t->text_field	( "Introduction Box Text" ),
			"order"		=> $t->integer_field	( "Order" )
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
	
	public static function get_sections( $db )
	{
		$sth = $db->prepare( "
			SELECT  	name, title
			FROM		sections
			ORDER BY	`order` ASC
		");
		
		$sth->execute();
		foreach( $sth->fetchAll( PDO::FETCH_ASSOC ) as $v )
		{
			$return[ $v[ "name" ] ] = $v[ "title" ];
		}
		
		return $return;
	}
}

?>