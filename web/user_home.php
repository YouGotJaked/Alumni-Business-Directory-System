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
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active"
                <a class="nav-link navbutton" href="user_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand mr-2" href="submit_business.php"><button class="btn btn-sm btn-outline-light">Submit Business</button></a>
            </li>
        </ul>
		
		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<img src="../img/three-bars.svg" width="20px">
		</button>
		
		<div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link" style="color: white" href="#">
                    <?php
                    session_start();
                    echo $_SESSION['email'];
                    ?>
                </span>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="../src/logout.php">Logout</a>
            </li>
        </ul>
		</div>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<div class="container mb-3 col-lg-6 col-sm-10">
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
		<input type="submit" class="btn submitbtn" name="submit">
		</form>
	</div>

	<?php
	include "../src/business.php";
        
    // Verify user is logged in
    if (!$_SESSION['login']) {
        header('Location: login.php');
    }

	$business = new Business();

	$category = "";
	$city = "";

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
			echo '<div class="card border-dark mb-3 container col-lg-6 col-sm-10">';
				echo '<div class="card-body">';
					echo '<a href="individual_business.php"><h5 class="card-header bg-transparent">' . $json->name . '</h5></a>';
					echo '<p class="card-body">' . $json->city . '</p>';
					echo '<p class="card-body">' . $json->description . '</p>';
					echo '<p class="card-body">' . $json->category . '</p>';
				echo '</div>';
			echo '</div>';
		} else if ($city !== "" && $city === $json->city) {
			echo '<div class="card border-dark mb-3 container col-lg-6 col-sm-10">';
				echo '<div class="card-body">';
					echo '<a href="individual_business.php"><h5 class="card-header bg-transparent">' . $json->name . '</h5></a>';
					echo '<p class="card-body">' . $json->city . '</p>';
					echo '<p class="card-body">' . $json->description . '</p>';
					echo '<p class="card-body">' . $json->category . '</p>';
				echo '</div>';
			echo '</div>';
		} else if ($category !== "" && $category === $json->category) {
			echo '<div class="card border-dark mb-3 container col-lg-6 col-sm-10">';
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
