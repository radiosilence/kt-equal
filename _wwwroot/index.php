<?php
/**
 * Basing the site's structure off of my cheapo framework, yay!
 */

# Definitions

define( "DIRSEP", DIRECTORY_SEPARATOR );
define( "LOCALE", "en_GB" );
define( "SITE_ROOT", realpath( dirname( __FILE__ ) . DIRSEP . '..' . DIRSEP ) . DIRSEP );
define( "BASE_HREF", preg_replace( "/(.*?)\/index.php/", "$1", $_SERVER[ 'PHP_SELF' ] ) );
define( "CONFIG_PATH", SITE_ROOT . DIRSEP . "config" );
define( "CORE_PATH", SITE_ROOT . DIRSEP . "core" );
define( "HOST", $_SERVER[ "HTTP_HOST" ] );

# If this is set to 1, searching will far faster but less det
# -ailed. (Using mysql full text natural searching). This for
# if there are many articles.
define( "QUICK_SEARCH", 0 );

function __autoload( $class_name )
{
	$filename = str_replace( "_", DIRSEP, strtolower( $class_name ) ) . '.php';
	$file = CORE_PATH . DIRSEP . $filename;
	
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