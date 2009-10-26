<?php
class seo_url
{
	public function __construct( $page )
	{
		$t = $page[ "title" ];
		$i = $page[ "id" ];
		$this->url = sprintf( "%d/%s.html", $i, $this->processString( $t ) );
	}
	private function processString( $string )
	{
		$a = array( 
			" "
		);
		$b = array( 
			"-"
		);
		
		$string = str_replace( $a, $b, strtolower( $string ) );
		return $string;
	}
}
?>