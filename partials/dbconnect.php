<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'lakshit');
define('DB_PASSWORD', '4P1vYx!z[D[atBQv');
define('DB_NAME', 'quizzy');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if( $link== false){
    die('Error: Cannot connect');
}
?>