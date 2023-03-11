<?php
    if($_SESSION['username'] != "admin"){
        header("Location: {$hostname}/admin/post.php");
    }
    $u_id = $_GET['id'];
    include 'config.php';

    $sql = "DELETE FROM user WHERE user_id = {$u_id}";
    
    if(mysqli_query($conn, $sql)){
        header("Location: {$hostname}/admin/users.php");
    }
?>