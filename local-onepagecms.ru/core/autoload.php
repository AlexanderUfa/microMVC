<?php 


//string(15) "Main_Controller"

spl_autoload_register( function ( $name )
{
    $dir = explode( '_' , $name );
    
    //var_dump($dir);
    require_once MODDIR . DS . $dir[0] . DS . $name . '.php' ;
    
}); 
