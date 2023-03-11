
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Newsblog | Login</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="css/user-login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<div id="menu0">
        <div class="container p-0">
            <div class="row py-3">
                <div class="col-md-8 p-0">
                    <a href="index.php" class="text-light"><i class="fa fa-phone"></i>&nbsp <span class="a"><b>CITIZEN JOURNALISM</b></span></a>
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
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="img-fluid d-block" height="300" width="200"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
				</nav>
			</div>
		</div>
	</div>
		<div class="login">
			<h1>LOGIN</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
		<h5><center>Don't have an account? <a href="register.php">Register here.</a></center></h5>
	</body>
</html>