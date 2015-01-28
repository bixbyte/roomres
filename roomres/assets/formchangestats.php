<?php

$scriptpath = substr( dirname( $_SERVER['SCRIPT_FILENAME'] ), 0, strpos( $_SERVER['SCRIPT_FILENAME'], '/fbapp/api' ) );
$paths = explode( DIRECTORY_SEPARATOR , $scriptpath );

$myName = array_pop( $paths );					// get name of the end of the array

// add the folder where all forms are rooted to the include path
//set_include_path( implode( '/', $paths) . PATH_SEPARATOR . get_include_path() );

require $scriptpath . '/fbapp/php/config.inc.php';

if( isset( $_GET[ 'error' ] ) ) {

	if( is_numeric( $_GET[ 'error' ] ) )
		$myPage->ReportStats( 'NotifyFormSubmit', $_GET[ 'error' ] );

} else {

	$myPage->ReportStats( 'NotifyFormChange' );
}
?>