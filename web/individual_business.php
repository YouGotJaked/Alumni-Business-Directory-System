<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
	<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="../js/scripts.js"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
	<?php
		session_start();
	?>
	<nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
				<?php
					if ($_SESSION['role'] == "Visitor" || $_SESSION['role'] == "Owner") {
						echo '<a class="nav-link navbutton" href="user_home.php">Home</a>';
					} else if ($_SESSION['role'] == "Manager") {
						echo '<a class="nav-link navbutton" href="manager_home.php">Home</a>';
					}
				?>
            </li>
        </ul>

		<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
			<img src="../img/three-bars.svg" width="20px">
		</button>

		<div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
			<?php
				if ($_SESSION['role'] == "Owner") {
                    echo '<a class="navbar-brand mr-2" href="edit_business.php"><button class="btn btn-sm btn-outline-light">Edit Business</button></a>';
                }

				if ($_SESSION['role'] == "Visitor" || $_SESSION['role'] == "Owner") {
					echo '<li class="nav-item"><a class="navbar-brand mr-2" href="submit_business.php"><button class="btn btn-sm btn-outline-light">Submit Business</button></a></li>';
				}
			?>
            <li class="nav-item">
                <span class="nav-link" style="color: white" href="#">
                    <?php
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
	<div class="card border-dark container col-lg-6 col-sm-10 p-3">
		<u><h1 id="business-name" class="text-uppercase text-center"></h1></u>
		<div id="business-category" class= "mb-3 text-uppercase text-center"></div>
		<p id="business-description" class="mx-auto"></p>
		<div id="business-street"></div>
		<div id="business-city"></div>
		<div id="business-state"></div>
		<div id="business-zip"></div>
		<div id="business-country"></div>
	</div>

	<?php

	include "../src/business.php";
	include "../src/user.php";

	// Verify user is logged in
	if (!$_SESSION['login']) {
		header('Location: login.php');
	}

	$business = new Business();
	$user = new User();

	if (isset($_GET['business_id'])) {
		$individual_business = $business->get_one("id", $_GET['business_id']);

		$json_obj = json_decode($individual_business)[0];

		$business_owner = $user->get_one("id", $json_obj->owner_id);
	} else {
		$individual_business = 0;
	}

	?>

	<script>
		$(function () {
        	populateIndividualBusinessFields(<?php echo $individual_business ?>, <?php echo $business_owner ?>)
    	});
	</script>
</body>
</html>
