<?php
/*разделитель категории*/
define('DS', DIRECTORY_SEPARATOR);

define('ROOTDIR', $_SERVER['DOCUMENT_ROOT']);

define('COREDIR', ROOTDIR . DS . 'core' . DS);

define('ROUTSDIR', ROOTDIR . DS . 'routes' . DS);

define('MODDIR', ROOTDIR . DS . 'modules' . DS);

require_once COREDIR. 'autoload.php';

require_once ROUTSDIR. 'routes.php';


