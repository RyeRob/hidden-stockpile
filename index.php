<?php

$vars = array_values( array_filter( explode( '/', $_SERVER['REQUEST_URI'] ) ) );

if( count( $vars ) % 2 )
{
  $page = $vars[0].'.php';
  array_shift( $vars );
}
else $page = 'index.php';

// these 3 lines are only necessary if the folder is not in the htdocs root but in a subfolder
if ($page == 'hidden-stockpile.php') {
  $page = 'index.php';
}

for( $i = 0; $i < count( $vars ); $i += 2 )
{
  $_GET[$vars[$i]] = $vars[$i+1];
}

// make the pathing work when it's not in the htdocs root but in a subfolder
define( 'WEB_ROOT', __DIR__ );

// define( 'WEB_ROOT', $_SERVER['DOCUMENT_ROOT'] );
define('VIEWS', WEB_ROOT . '/views');
define('STYLES', WEB_ROOT . '/styles');

include( WEB_ROOT.'/includes/config.php' );
//include( WEB_ROOT.'/includes/classes/database.php' );
include( WEB_ROOT.'/includes/functions.php' );

include( WEB_ROOT.'/views/'.$page );

