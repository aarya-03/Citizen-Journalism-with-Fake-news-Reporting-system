<?php
    if($_SESSION['username'] != "admin"){
        header("Location: {$hostname}/admin/post.php");
    }
    $c_id = $_GET['id'];
    include 'config.php';

    $sql = "DELETE FROM category WHERE category_id = {$c_id}";
    
    if(mysqli_query($conn, $sql)){
        header("Location: {$hostname}/admin/category.php");
    }
?>