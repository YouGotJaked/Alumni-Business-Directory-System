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
  		<a href="user_home.php" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit_business.php"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<div class="container mb-3 col-6">
		<label for="exampleFormControlSelect1">What type of business are you looking for?</label>
		<form action="user_home.php" method="post">
		<select class="form-control mb-3" id="exampleFormControlSelect1" name="category" value="">
			<option disabled selected value> -- select an option -- </option>
			<option value="Restaurant">Restaurant</option>
			<option value="Shopping">Shopping</option>
			<option value="Professional Services">Professional Services</option>
			<option value="Local Services">Local Services</option>
			<option value="Home Services">Home Services</option>
		</select>
		<input type="text" class="form-control mb-3" placeholder="City" name="city">
		<input type="submit" class="btn btn-info" name="submit">
		</form>
	</div>

	<?php 
	
	error_reporting(0);

	include "../src/business.php";
    
    // Verify user is logged in
    if (!$_SESSION['login']) {
        header('Location: login.php');
    }

	$business = new Business();

	$category; 
	$city;

	if (isset($_POST['submit'])) {
		try {
			$category = $_POST["category"];
		} catch(Exception $e) {
			$category = "";
		}

		try {
			$city = $_POST["city"];
		} catch(Exception $e) {
			$city = "";
		}
	}

	$approved = $business->get_all("status", "Approved");
	
	foreach (json_decode($approved) as &$json) {	
		if (($city !== "" && $category !== "" && $city === $json->city && $category === $json->category)) {
			echo '<div class="card border-dark mb-3 container col-4">';
				echo '<div class="card-body">';
					echo '<a href="individual_business.php"><h5 class="card-header bg-transparent">' . $json->name . '</h5></a>';
					echo '<p class="card-body">' . $json->city . '</p>';
					echo '<p class="card-body">' . $json->description . '</p>';
					echo '<p class="card-body">' . $json->category . '</p>';
				echo '</div>';
			echo '</div>';
		} else if ($city !== "" && $city === $json->city) {
			echo '<div class="card border-dark mb-3 container col-4">';
				echo '<div class="card-body">';
					echo '<a href="individual_business.php"><h5 class="card-header bg-transparent">' . $json->name . '</h5></a>';
					echo '<p class="card-body">' . $json->city . '</p>';
					echo '<p class="card-body">' . $json->description . '</p>';
					echo '<p class="card-body">' . $json->category . '</p>';
				echo '</div>';
			echo '</div>';
		} else if ($category !== "" && $category === $json->category) {
			echo '<div class="card border-dark mb-3 container col-4">';
				echo '<div class="card-body">';
					echo '<a href="individual_business.php"><h5 class="card-header bg-transparent">' . $json->name . '</h5></a>';
					echo '<p class="card-body">' . $json->city . '</p>';
					echo '<p class="card-body">' . $json->description . '</p>';
					echo '<p class="card-body">' . $json->category . '</p>';
				echo '</div>';
			echo '</div>';
		}
	}

	?>
</body>
</html>
