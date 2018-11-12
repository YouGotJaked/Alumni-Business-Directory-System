<!doctype html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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

	<form class="container" method="post" action="signup.php">
  		<div class="form-row mb-3">
    		<div class="col">
				<label for="validationServer01">First name</label>
      			<input type="text" class="form-control" placeholder="First name" required name="first">
    		</div>
    		<div class="col">
				<label for="validationServer01">Last name</label>
      			<input type="text" class="form-control" placeholder="Last name" required name="last">
    		</div>
  		</div>
		<div class="form-row mb-3">
    		<div class="col-2">
				<label for="validationServer01">Graduation Year</label>
      			<input type="number" class="form-control" placeholder="Graduation Year" required name="year">
    		</div>
    		<div class="col">
				<label for="validationServer01">Degree</label>
      			<input type="text" class="form-control" placeholder="Degree" required name="degree">
    		</div>
  		</div>
		<div class="form-row mb-3">
			<div class="col">
				<label for="validationServer01">Email</label>
      			<input type="text" class="form-control" placeholder="Email" required name="email">
    		</div>
			<div class="col">
				<label for="validationServer01">Password</label>
      			<input type="password" class="form-control" placeholder="Password" required name="password">
    		</div>
			<div class="col">
				<label for="validationServer01">Confirm Password</label>
      			<input type="password" name ="confirm_password" class="form-control" placeholder="Confirm Password" required>
    		</div>
		</div>
		<input type="submit" class="btn btn-primary mb-3" name="submit">
	</form>
    <?php
    require_once "../src/login.php";

    if (isset($_POST["submit"])) {
        create_user($_POST["first"], $_POST["last"], $_POST["degree"], $_POST["year"], $_POST["email"], $_POST["password"], "Visitor", 0);
        header('Location: user_home.php');
    }
    ?>
</body>
</html>
