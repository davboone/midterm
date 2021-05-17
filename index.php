<?php
//start session
session_start();
//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

//Instantiate Fat-Free
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function($f3){
    $userOptions = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userOptions = $_POST['options'];

        $_SESSION['name'] = $_POST['name'];

            $_SESSION['options'] = implode(", ",$userOptions);

        header("location: summary");
    }

    $f3->set('options',getOptions());

    //Display the home page
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET /summary', function(){

    //Display the home page
    $view = new Template();
    echo $view->render('views/summary.html');
});

$f3->run();