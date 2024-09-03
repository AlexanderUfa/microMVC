<?php

$url = $_SERVER['REQUEST_URI'];

 

if ($url == '/') 
{
    $controller = new \Main_Controller();
            
}




unset($url);

