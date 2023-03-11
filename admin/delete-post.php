<?php 
    include 'config.php';
    $p_id = $_GET['id'];
    $c_id = $_GET['catid'];

    $sql1 = "SELECT * FROM post WHERE post_id = {$p_id};";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result);

    unlink("upload/".$row['post_img']);

    $sql = "DELETE FROM post WHERE post_id = {$p_id};";
    $sql .= "UPDATE category SET post = post-1 WHERE category_id = {$c_id}";

    if(mysqli_multi_query($conn, $sql)){
        header("Location: {$hostname}/admin/post.php");
    }
?>