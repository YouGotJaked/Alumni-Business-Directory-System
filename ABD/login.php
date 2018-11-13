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
	<nav class="navbar navbar-toggleable-md container-fluid">
  		<a href="user_home.php" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit_business.php"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>

    <?php
    session_start();
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
                $_SESSION['user'] = $user_id;       // Track user id
                $loc = "user_home.php"
                if ($user_role = "Manager") {
                    $loc = "manager_home.php";
                }
                header(Location: $loc);            // Go to home page
            } else {
                $login_error = "Invalid credentials.";
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
  	<input type="submit" name="submit" class="btn btn-outline-dark">
    <?php echo "<br>" . $login_error; ?>
	</form>
</body>
</html>
