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
  		<a href="user-home.php" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit-business.html"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
    <?php
    include "../src/login.php";
    $login_error = "";
    if (isset($_POST["submit"])) {
        try {
            if (login($_POST["email"], $_POST["password"])) {
                $login_error = "Login successful.";
                header('Location: user_home.php');
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
    <?php echo $login_error; ?>
	</form>
</body>
</html>
