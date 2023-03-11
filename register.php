<?php include "header.php"; 
    if(isset($_POST['save'])){
        include 'config.php';
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        $lname = mysqli_real_escape_string($conn,$_POST['lname']);
        $user = mysqli_real_escape_string($conn,$_POST['user']);
        $word = mysqli_real_escape_string($conn,md5($_POST['password']));
        $user_role = mysqli_real_escape_string($conn,$_POST['user_role']);;
        // $field = mysqli_real_escape_string($conn,$_POST['field']);
        $sql = "SELECT username FROM user WHERE username = '{$user}'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            echo "<p style='color:red;text-align:center;margin:10px 0;'>Username already Exits</p>";
        }else{
            $sql1 = "INSERT INTO user (first_name, last_name, username,password, user_role)
                    VALUES ('{$fname}', '{$lname}', '{$user}', '{$word}', '{$user_role}')";
            if(mysqli_query($conn, $sql1)){
                // header("Location:{$hostname}/admin/index.php");
            }
            echo "<p style='color:red;text-align:center;margin:10px 0;'>Thanks for registering! You can login now.</p>";
            } 
    }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              
              <div class="offset-md-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ;?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Category</label>
                          <select name="user_role" class="form-control">
                            <option value="Student">Student</option>
                            <option value="Working Proffessional">Working Proffessional</option>
                            <option value="Professor">Professor</option>
                            <option value="Business">Business</option>
                            <option value="Farmer">Farmer</option>
                            <option value="Home Maker">Home Maker</option>
                            <option value="Journalist">Journalist</option>
                        </select>
                     </div>
                      
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
