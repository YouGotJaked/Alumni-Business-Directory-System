<!doctype html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link navbutton" href="user_home.php">Home</a>
            </li>
        </ul>
		
		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<img src="Assets/three-bars.svg" width="20px">
		</button>
		
		<div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item">
                <a class="navbar-brand mr-2" href="submit_business.php"><button class="btn btn-sm btn-outline-light">Submit Business</button></a>
            </li>
            <li class="nav-item">
                <span class="nav-link" style="color: white">Name</span>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="login.php">Logout</a>
            </li>
        </ul>
		</div>
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
            if (login($_POST["email"], $_POST["password"])) {
                $json = $user->get_one("email", $_POST["email"]);
                $json_obj = json_decode($json);
                $user_id = $json_obj[0]->id;
                $_SESSION['user'] = $user_id;       // Track user id
                header('Location: user_home.php');  // Go to home page
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
