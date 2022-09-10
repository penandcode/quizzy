<?php
include 'dbconnect.php';
if(isset($_GET['id'])){
$category_id = $_GET['id'];
$query = "DELETE FROM `question` WHERE id = $category_id";
$result = mysqli_query($link, $query);
header("Location: ../admin/questions.php");
}
?>