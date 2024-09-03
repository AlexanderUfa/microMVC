<?php

define('DS',DIRECTORY_SEPARATOR);

define('ROOTDIR',$_SERVER['DOCUMENT_ROOT']);

define('COREDIR',ROOTDIR.DS.'core'.DS);

define('ROUTSDIR',ROOTDIR.DS.'routes'.DS);

require_once COREDIR.'autoload.php';

require_once ROUTSDIR.'routes.php';


