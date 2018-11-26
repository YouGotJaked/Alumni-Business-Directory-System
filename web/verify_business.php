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
            <li class="nav-item">
                <a class="nav-link navbutton" href="manager_home.php">Home</a>
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
	<?php
	include "../src/business.php";
	include "../src/user.php";
	
    // Verify user is logged as administrator
    if (!$_SESSION['login']) {
        header('Location: login.php');
    } else if ($_SESSION['role'] != "Manager") {
        header('Location: user_home.php');
    }

	$business = new Business();
	$user = new User();

	if (isset($_POST['submit'])) {
		$choice = $_POST["choice"];
		if (strpos($choice, "confirm") === 0) {
			$id = str_replace("confirm", "", $choice);
			$business->update($id, "status", "Approved");
            
            $owner_id = $business->get_one($id, "owner_id");
            
            $update_resp = $user->update($owner_id, "status", "Owner");
            if ($update_resp) {
                echo "User has been updated" . "<br>";
            } else {
                echo "Failed to update user" . "<br>";
            }
            
		} else if (strpos($choice, "deny") === 0) {
			$id = str_replace("deny", "", $choice);
			$business->update($id, "status", "Denied");
		} else {

		}
	} 

	$requested = $business->get_all("status", "Requested");
	
	// TODO turn this function into jQuery stuff so that its easier to manipulate - populateVerifyBusinessList()
	// have the function trigger onchange of any of the field states 
	foreach (json_decode($requested) as &$json) : ?>	
		<?php $owner = json_decode($user->get_one("id", $json->owner_id))[0]; ?>

		<div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
			<div class="card-header">Business Name: <?= $json->name ?></div>
			<div class="card-body text-dark">
				<p class="card-text">Business Owner: <?= $owner->first_name . ' ' . $owner->last_name ?></p>
				<p class="card-text">Business Description: <?= $json->description ?></p>
				<p class="card-text">Owner Email: <?= $owner->email ?></p>
				<p class="card-text">Degree: <?=  $owner->degree ?></p>
				<p class="card-text">Graduation Year: <?= $owner->graduation_year ?></p>
				<p class="card-text">Street: <?= $json->street ?></p>
				<p class="card-text">City: <?= $json->city ?></p>
				<p class="card-text">State: <?= $json->state ?></p>
				<p class="card-text">Zip Code: <?= $json->zip ?></p>
				<p class="card-text">Country: <?= $json->country ?></p>
			
			<form class="card-footer bg-transparent" action="verify_business.php" method="post">
			<div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="choice" value="confirm<?= $json->id ?>">
					<label class="form-check-label" for="exampleRadios1">Confirm</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="choice" value="deny<?= $json->id ?>">
					<label class="form-check-label" for="exampleRadios2">Deny</label>
				</div>
				<input type="submit" class="btn btn-primary" name="submit">
			</div>
			</form>
		</div>
	<?php endforeach ?>
</body>
</html>
