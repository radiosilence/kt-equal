<?php

class models_article extends model 
{
	# The database
	public $db;
	# Results and queries of the get_list function, to avoid needless repetition.
	private static $list_queries_run = array();
	private static $list_result = array();
	
	public function __construct( $db )
	{
		$this->db = $db;
		$this->define();
	}
	
	
	protected function define()
	{
		$t = $this;
		
		$t->name = "article";
		$t->nice_name = "Article";

		$t->primary_table = "articles";
		$t->primary_key = "articles.id";
		
		$t->table( "articles", array(
			"id"		=> $t->primary_key	(),
			"title"		=> $t->char_field	( "Title" ),
			"body"		=> $t->text_field	( "Body" ),
			"author"	=> $t->char_field	( "Author(s)" ),
			"date"		=> $t->char_field	( "Date Published" ),
			"publisher"	=> $t->char_field	( "Publisher" ),
			"date_added"	=> $t->datetime_field	( "Date Added" )
		));
		$t->table( "test", array( 
			"blah"		=> $t->char_field	( "Blah!")
		));
		$t->table( "test2", array( 
			"blah"		=> $t->char_field	( "Blah!")
		));

	}
	
	public function get_list( $args = array() )
	{
		$db = $this->db;
		
		$q = "	SELECT 		title, id
			FROM 		articles
			ORDER BY	title
		";
			
		$sth = $db->prepare( $q );
		
		if( !in_array( $q, self::$list_queries_run ))
		{
			$sth->execute();
			self::$list_result = $sth->fetchAll();
			self::$list_queries_run[] = $q;
		}
		return self::$list_result;
	}
	
	public function default_form()
	{
		return array(
			"Article Information" => array(
				"title" => "title",
				"author",
				"date",
				"publisher",
				"date_added",
				"test.blah",
				"test2.blah"
			),
			"Article" => array(
				"body"
			)
		);
	}
}

?>