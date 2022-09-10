

<?php
include 'dbconnect.php';
if(isset($_GET['id'])){
$category_id = $_GET['id'];
$query = "DELETE FROM `category` WHERE id = $category_id";
$result = mysqli_query($link, $query);
header("Location: ../admin/category.php");
}?>