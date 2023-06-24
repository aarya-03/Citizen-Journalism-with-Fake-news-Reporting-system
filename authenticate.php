<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'newsblog';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
} 
else  
{  
     $username = mysqli_real_escape_string($con, $_POST["username"]);  
     $password = mysqli_real_escape_string($con, $_POST["password"]);  
     $password = md5($password);  
     $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";  
     $result = mysqli_query($con, $query);  
     if(mysqli_num_rows($result) > 0)  
     {  
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $row['username']; 
            $_SESSION['user_id'] = $row['user_id'];
        } 
          header("location:home.php");

          $file_path = "username.txt";
          file_put_contents($file_path, $username);
     }  
     else  
     {  
        echo 'Incorrect username or password!'; 
     }  
} 

?>  

