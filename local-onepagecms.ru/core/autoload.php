<?php

spl_autoload_register(function ($name)
{
    var_dump($name);
    exit;
}); 
