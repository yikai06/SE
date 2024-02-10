<?php



// request database

$databaseName = 'localhost'; // Server

$userName = 'root'; // Username

$password = ''; // Password

$database = 'se'; // Database name

$prefix = 'system_'; // Table prefix name

$prefix2 = 'website_' ;

$plan = 'plan' ;

$member = 'member' ;

$trainer = 'trainer' ;

$class = 'class' ;

$task = 'task' ;

$payment = 'payment' ;

$paths = 'http://localhost/SE-main/adm/';

$pathss = 'http://localhost/SE-main/';

$mysqli = new mysqli($databaseName, $userName, $password, $database) ; // Connect to database

$mysqli->set_charset("utf8");



date_default_timezone_set('Asia/Kuala_Lumpur') ;



// Check connection //

if ($mysqli->connect_errno) {

    printf("Connect failed: %s\n", mysqli_connect_error()) ;

    exit ;

}


define('COMPANY', 'SweatLab Fitness Club') ;

?>