<?php
/*разделитель категории*/

define('DS', DIRECTORY_SEPARATOR);

define('ROOTDIR', $_SERVER['DOCUMENT_ROOT']);

define('COREDIR', ROOTDIR . DS . 'core' . DS);

define('MODDIR', ROOTDIR . DS . 'modules' . DS);

$arrFiles = glob( COREDIR  . "*.php" );
foreach ( $arrFiles as $filename ) 
{
    require_once $filename;
}

require_once ROOTDIR . DS . 'routes.php';

unset( $arrFiles , $filename );