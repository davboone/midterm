<?php
//start session
session_start();
//This is my controller for the datingSite project



//Turn on error-reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

//Required files
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');

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
    $userName = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $userOptions = $_POST['options'];

        $userName = $_POST['name'];
        if(validName($userName)){
            $_SESSION = $userName;
        }
        else{
            $f3->set('errors["name"]', "Please enter a name");
        }
        if(!empty($userOptions) && validOptions($userOptions)){
            $_SESSION['options'] = implode(", ",$userOptions);
        }
        else{
            $f3->set('errors["option"]', "Please select an option");
        }

        if(empty($f3->get('errors'))){
            header("location: summary");
        }

    }

    $f3->set('options',getOptions());
    $f3->set('userOption',$userOptions);
    $f3->set('userName',$userName);

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