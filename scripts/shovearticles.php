<?php
/**
 * Shove articles into the db from xml files taken as arguments.
 * This could be quite confusing - perhaps parse the custom weird XML element things into lists before putting in database?
 */
 array_shift( $argv );
 
 if( count( $argv ) < 1 )
 {
 	die( "Please specify some input files!\n" );
 }
 
 foreach( $argv as $file )
 {
 	printf( "Searching for %s", $file );
 	if( file_exists( $file ) )
 	{
 		$xmls[] = array_shift( $argv );
 		printf( "...exists!\n" );
 	}
 	else
 	{
 		array_shift( $argv );
 		printf( "...not found\n" );
 	}
 }
 
 if( !is_array( $xmls ) )
 {
 	die( "None of the specified inputs were found\n" );
 }
 
 foreach( $xmls as $xmlfile )
 {
 	$x = simplexml_load_string( file_get_contents( $xmlfile ) );
 	print_r( $x );
 } 
 ?>