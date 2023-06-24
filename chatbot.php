<?php 
    $page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Report News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/main.css">
    <style>
        df-messenger {
            --df-messenger-button-titlebar-color: #d6d6c2;
            --df-messenger-button-titlebar-font-color: #000000;
            --df-messenger-bot-message: #e0e0d1;
            --df-messenger-user-message: #d9ffb3;
        }
    </style>
</head>
<body>
<!-- HEADER -->
<div id="menu0">
        <div class="container p-0">
            <div class="row py-3">
                <div class="col-md-8 p-0">
                    <a href="home.php" class="text-light"><i class="fa fa-phone"></i>&nbsp <span class="a"><b>CITIZEN JOURNALISM</b></span></a>
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
                    <a class="navbar-brand" href="home.php"><img src="images/logo.png" class="img-fluid d-block" height="300" width="200"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <div class="ml-auto">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="admin/post.php">Add Post</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white" href="logout.php">Logout</a>
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
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 

                    include 'config.php';

                    if(isset($_GET['cid'])){
                        $c_id = $_GET['cid'];
                    }

                    $sql = "SELECT * FROM category WHERE post > 0";
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    if(mysqli_num_rows($result)){
                        $active = "";
                ?>
                <ul class='menu'>
                    <li><a href='home.php'>Home</a></li>
                    <?php 
                    while($row = mysqli_fetch_assoc($result)){
                        
                        if(isset($_GET['cid'])){
                            if($row['category_id'] == $c_id){
                                $active = "active";
                            }else{
                                $active = "";
                            }
                        }
                        echo "<li><a class='{$active}' href='login-category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                    } 
                    ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    
<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                    <?php 
                        include 'config.php';

                        $p_id = 0;
                        if(isset($_GET['id']) && is_numeric($_GET['id']))
                        {
                            $p_id = $_GET['id'];
                        }

                        $sql = "SELECT * FROM post LEFT JOIN category ON post.category = category.category_id
                                LEFT JOIN user ON post.author = user.user_id
                                WHERE post.post_id = {$p_id}";
                        
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <div class="post-content single-post">
                            <h3 style="color:orangered;"><?php echo $row['title']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['first_name']." ".$row['last_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                                <?php
                                    $news_id = $p_id;
                                    $file_path = "newsID.txt";
                                    file_put_contents($file_path, $news_id);
                                ?>
                                <!-- <input type="button" value="Report" onclick="location='chatbot.php'" class="btn-danger"> -->
                                <!-- <button onclick="report()" class="btn btn-danger" >Report</button> -->
                                <button type="button" class="btn-report" disabled>Report</button>
                            </div>

                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                        </div>
                       <?php 
                            }
                        }
                       ?> 
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>   
 
<?php include 'footer.php'; ?>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger 
    intent="WELCOME" 
    chat-title="News Assistant" 
    agent-id=<dialogflow-agent-id>
    chat-icon="https://ochatbot.com/wp-content/uploads/2018/03/chatbot-icon.png"
    expand="true"
    language-code="en">
</df-messenger>
