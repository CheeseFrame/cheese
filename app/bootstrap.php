<?php
    require 'config/config.php';
    
    //Load helpers here
    include 'helpers/404.php';
    spl_autoload_register(function($className){
        require 'libraries/'.$className.'.php';
    });

