<!doctype html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
	<nav class="navbar navbar-expand">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navbutton" href="user_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="submit_business.php">Submit Business</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link" style="color: white" href="#">Name</span>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="login.php">Logout</a>
            </li>
        </ul>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>

    <?php
    session_start();
    // session_regenerate_id(true);
        
    require_once "../src/login.php";
    require_once "../src/user.php";
    
    $user = new User();
    $login_error = "";
    // When user clicks Submit button
    if (isset($_POST["submit"])) {
        try {
            $_SESSION['login'] = login($_POST["email"], $_POST["password"]);
            
            if ($_SESSION['login']) {
                $json = $user->get_one("email", $_POST["email"]);
                $json_obj = json_decode($json);
                $user_id = $json_obj[0]->id;
                $user_role = $json_obj[0]->role;
                
                // Track user email and ID
                $_SESSION['email'] = $json_obj[0]->email;
                $_SESSION['user'] = $user_id;
                
                $loc = ($user_role == "Manager") ? "manager_home.php" : "user_home.php";
                header("Location:" . $loc);         // Go to home page
            } else {
                $login_error = "Invalid Email or Password";
            }
        } catch(Exception $e) {
            echo $e . "<br>";
        }
    }
    ?>

	<form class="container col-5" method="post" action="login.php">
  	<div class="form-group">
    	<label for="exampleInputEmail1">Email</label>
    	<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
  	</div>
  	<div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" required>
  	</div>
	<div class="form-group">
		<a href="signup.php">Don't have an account?</a>	
	</div>
  	<input type="submit" name="submit" class="btn submitbtn">
    <?php echo "<br>" . $login_error; ?>
	</form>
</body>
</html>
