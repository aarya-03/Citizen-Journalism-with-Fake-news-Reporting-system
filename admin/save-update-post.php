<?php 
    include 'config.php';

    if(empty($_FILES['new-image']['name'])){
        $file_name = $_POST['old-image'];
    }else{
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        // $file_ext = strtolower(end(explode(".",$file_name)));
        $file_parts = explode(".", $file_name);
        $file_ext = strtolower(end($file_parts));

        $extension = array("jpeg","jpg","png");

        if(in_array($file_ext,$extension) === false){
            $errors[] = "This extension file not allowed, Please Choose a JPG or PNG file.";
        }
        
        if($file_size > 2097152){
            $errors[] = "File size Must be 2mb or lower";
        }

        if(empty($errors)){
            move_uploaded_file($file_tmp,"upload/".$file_name);
        }else{
            print_r($errors);
        }
    }

    $p_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $description = mysqli_real_escape_string($conn, $_POST['postdesc']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $sql = "UPDATE post SET title = '{$title}', description = '{$description}', category = '{$category}', post_img = '{$file_name}' WHERE post_id = {$p_id}";

    if(mysqli_query($conn, $sql)){
        header("Location: {$hostname}/admin/post.php");
    }

?>