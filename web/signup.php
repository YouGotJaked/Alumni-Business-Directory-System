<!doctype html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>

	<form class="container" method="post" action="">
  		<div class="form-row">
    		<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">First name</label>
      			<input type="text" class="form-control" placeholder="First name" required name="first">
    		</div>
    		<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Last name</label>
      			<input type="text" class="form-control" placeholder="Last name" required name="last">
    		</div>
  		</div>
		<div class="form-row">
    		<div class="col-lg-2 col-sm-12 mb-3">
				<label for="validationServer01">Graduation Year</label>
      			<input type="number" class="form-control" placeholder="Graduation Year" required name="year">
    		</div>
    		<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Degree</label>
      			<input type="text" class="form-control" placeholder="Degree" required name="degree">
    		</div>
  		</div>
		<div class="form-row">
			<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Email</label>
      			<input type="text" class="form-control" placeholder="Email" required name="email">
    		</div>
			<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Password</label>
      			<input type="password" class="form-control" placeholder="Password" required name="password">
    		</div>
			<div class="col-lg col-lg-12 mb-3">
				<label for="validationServer01">Confirm Password</label>
      			<input type="password" name ="confirm_password" class="form-control" placeholder="Confirm Password" required>
    		</div>
		</div>
		<input type="submit" class="btn submitbtn mb-3" name="submit">
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
