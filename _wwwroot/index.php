<?php
/**
 * Basing the site's structure off of my cheapo framework, yay!
 */

# Definitions

define( "DSEP", DIRECTORY_SEPARATOR );
define( "LOCALE", "en_GB" );
define( "SITE_ROOT", realpath( dirname( __FILE__ ) . DSEP . '..' . DSEP ) . DSEP );
define( "BASE_HREF", preg_replace( "/(.*?)\/index.php/", "$1", $_SERVER[ 'PHP_SELF' ] ) );
define( "CONFIG_PATH", SITE_ROOT . DSEP . "config" );
define( "CORE_PATH", SITE_ROOT . DSEP . "core" );
define( "HOST", $_SERVER[ "HTTP_HOST" ] );

function __autoload( $class_name )
{
	$filename = str_replace( "_", DSEP, strtolower( $class_name ) ) . '.php';
	$file = CORE_PATH . DSEP . $filename;
	
	if( !file_exists( $file ))
	{
		die( "Could not find " . $file . "!\n" );
		return false;
	}

	include ( $file );
}

# System happening
$registry = new registry;

# Load router
$router = new router( $registry );
$registry->set( 'router', $router );
$router->set_path( SITE_ROOT . 'controllers' );
$router->delegate();
?>