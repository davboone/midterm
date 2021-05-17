<?php
//start session
session_start();
//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /survey', function(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    }
    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->run();