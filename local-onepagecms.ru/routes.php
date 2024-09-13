<?php

$url = $_SERVER['REQUEST_URI'];

 

if ($url == '/') 
{
    
    $request = new MainPage_C();
    
}




unset($url);

