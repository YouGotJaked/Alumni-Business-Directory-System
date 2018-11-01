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
	<nav class="navbar navbar-toggleable-md container-fluid">
  		<a href="user-home.html" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit-business.html"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<form class="container" action="">
  		<div class="form-row mb-3">
    		<div class="col">
				<label for="validationServer01">First name</label>
      			<input type="text" name="first" class="form-control" placeholder="First name" required>
    		</div>
    		<div class="col">
				<label for="validationServer01">Last name</label>
      			<input type="text" name="last" class="form-control" placeholder="Last name" required>
    		</div>
  		</div>
		<div class="form-row mb-3">
    		<div class="col-2">
				<label for="validationServer01">Graduation Year</label>
      			<input type="number" name="year" class="form-control" placeholder="Graduation Year" required>
    		</div>
    		<div class="col">
				<label for="validationServer01">Degree</label>
      			<input type="text" name="degree" class="form-control" placeholder="Degree" required>
    		</div>
  		</div>
		<div class="form-row mb-3">
			<div class="col">
				<label for="validationServer01">Email</label>
      			<input type="text" name="email" class="form-control" placeholder="Email" required>
    		</div>
			<div class="col">
				<label for="validationServer01">Password</label>
      			<input type="password" name="password" class="form-control" placeholder="Password" required>
    		</div>
			<div class="col">
				<label for="validationServer01">Confirm Password</label>
      			<input type="password" name ="confirm_password" class="form-control" placeholder="Confirm Password" required>
    		</div>
		</div>
		<input type="submit" name="submit" class="btn btn-info">
	</form>
    <?php
    include "../src/login.php";
    if (isset($_POST['submit'])) {
        create_user($_POST["first"], $_POST["last"], $_POST["degree"], $_POST["year"], $_POST["email"], $_POST["password"], "Visitor", 0);
    }
    if (isset($_POST)) {
        echo "YE YE YE" . "<br>";
    }
    ?>
</body>
</html>
