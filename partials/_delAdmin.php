<?php
include 'dbconnect.php';
$del_id = $_GET['id'];
if($del_id == 1){
    $msg = "Can't delete the Superadmin";
    header("Location: ../admin/add-admin.php?msg=$msg");
}
else{
    $query = "DELETE FROM `admin` WHERE id = $del_id";
    $result = mysqli_query($link, $query);
    if($result){
        $msg="Admin Deleted";
        header("Location: ../admin/add-admin.php?msg=$msg");
    }
}
?>