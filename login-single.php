<?php include 'login-header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsblog</title>
    <link rel="stylesheet" href="css/reportButton.css">
</head>
<body>
    
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
                                <button type="button" id="reportBtn" class="btn-report" onclick="location='chatbot.php?id=<?php echo $p_id; ?>'">Report</button>


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
    </body>
</html>
<?php include 'footer.php'; ?>
