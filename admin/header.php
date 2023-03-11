<?php 
    include 'config.php';
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: {$hostname}/admin/");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<!-- HEADER -->
<div id="menu0">
        <div class="container p-0">
            <div class="row py-3">
                <div class="col-md-8 p-0">
                    <a href="#" class="text-light"><i class="fa fa-phone"></i>&nbsp <span class="a"><b>CITIZEN JOURNALISM</b></span></a>
                    <a href="#" class="text-light"><i class="fa fa-envelope-open-o"></i>&nbsp <span class="b"><b> </b></span></a>
                    <a href="#" class="text-light"><i class="fa fa-map-marker"></i>&nbsp <span class="c"><b></b></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark navbar-inverse">
                    <a class="navbar-brand" href="#"><img src="images/logo.png" class="img-fluid d-block" height="300" width="200"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <div class="ml-auto">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="http://localhost/newsblog/index.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="http://localhost/newsblog/home.php">HOME</a>
                            </li>
                            <li>
                                <a href="post.php">ALL POST</a>
                            </li>
                            <?php 
                                if($_SESSION['username'] == 'admin'){
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<!-- /Menu Bar -->
<?php 
    $page = basename($_SERVER['PHP_SELF']);
?>
