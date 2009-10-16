<?php

# Definitions

define( "DSEP", DIRECTORY_SEPARATOR );
define( "LOCALE", "en_GB" );
define( "SITE_ROOT", realpath( dirname( __FILE__ ) . DIRSEP . '..' . DIRSEP ) . DIRSEP );
define( "BASE_HREF", preg_replace( "/(.*?)\/index.php/", "$1", $_SERVER[ 'PHP_SELF' ] ) );
define( "CONFIG_PATH", SITE_ROOT . DSEP . "config" );
define( "CORE_PATH", SITE_ROOT . DSEP . "core" );

function __autoload( $class_name )
{
	$filename = str_replace( "_", DIRSEP, strtolower( $class_name ) ) . '.php';
	$file = CORE_PATH . $filename;
	
	if( !file_exists( $file ))
	{
		die( "Could not find " . $file . "!\n" );
		return false;
	}

	include ( $file );
}
?>