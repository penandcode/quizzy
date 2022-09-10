<?php 
session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ' '){
    header("Location: index.php");
    die();
}?>
    