<!--User is able to fill out a form that will be sent to the Office Manager to be verified-->
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
			<img src="../img/three-bars.svg" width="20px">
		</button>

		<div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item">
                <?php
                session_start();
                    
                // Verify user is logged in
                if (!$_SESSION['login']) {
                    header('Location: login.php');
                }
                    
                if ($_SESSION['role'] == "Owner") {
                    echo '<a class="navbar-brand mr-2" href="edit_business.php"><button class="btn btn-sm btn-outline-light">Edit Business</button></a>';
                }
                ?>
                <a class="navbar-brand mr-2" href="submit_business.php"><button class="btn btn-sm btn-outline-light">Submit Business</button></a>
            </li>
            <li class="nav-item">
                <span class="nav-link" style="color: white" href="#">
                    <?php echo $_SESSION['email']; ?>
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
	<form class="container col-lg-8" method="post" action="submit_business.php">
  		<div class="form-row">
    		<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Business Name</label>
      			<input type="text" name="name" class="form-control" placeholder="Business Name" required>
    		</div>
  		</div>
		<div class="form-row">
			<div class="form-group col-lg col-sm-12 mb-3">
    			<label for="exampleFormControlTextarea1">Business Description</label>
    			<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Business Description..." required></textarea>
  			</div>
		</div>
		<div class="form-row">
			<div class="col-lg col-sm-12 mb-3">
    			<label for="exampleFormControlSelect1">Type of Business</label>
    			<select class="form-control" name="category" id="exampleFormControlSelect1" required>
					<option disabled selected value> -- select an option -- </option>
					<option>Restaurant</option>
     				<option>Shopping</option>
      				<option>Professional Services</option>
					<option>Local Services</option>
					<option>Home Services</option>
    			</select>
			</div>
  		</div>
		<div class="form-row">
			<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Street</label>
      			<input type="text" name="street" class="form-control" placeholder="Street" required>
    		</div>
			<div class="col-lg-4 col-sm-12 mb-3">
				<label for="validationServer01">City</label>
      			<input type="text" name="city" class="form-control" placeholder="City" required>
    		</div>
			<div class="col-lg-2 col-sm-12 mb-3">
				<label for="validationServer01">State</label>
      			<input type="text" name="state" class="form-control" placeholder="State" required>
    		</div>
		</div>
		<div class="form-row">
			<div class="col-lg-4 col-sm-12 mb-3">
				<label for="validationServer01">Zip Code</label>
      			<input type="text" name="zip" class="form-control" placeholder="Zip Code" required>
    		</div>
			<div class="col-lg col-sm-12 mb-3">
				<label for="validationServer01">Country</label>
      			<input type="text" name="country" class="form-control" placeholder="Country" required>
    		</div>
		</div>
		<input type="submit" class="btn submitbtn mb-4" name="submit">
        <?php
        require_once "../src/business.php";
        require_once "../src/user.php";

        if (isset($_POST["submit"])) {
            $business = new Business();
            $user = new User();

            $json = ['name' => $_POST["name"],
            'status' => "Requested",
            'description' => $_POST["description"],
            'category' => $_POST["category"],
            'street' => $_POST["street"],
            'city' => $_POST["city"],
            'state' => $_POST["state"],
            'zip' => $_POST["zip"],
            'country' => $_POST["country"],
            'owner_id' => $_SESSION['user']];

            $json_obj = json_encode($json, JSON_PRETTY_PRINT);
            $add_resp = $business->add($json_obj);
            if ($add_resp) {
                echo "<br>" . "Business request sent for approval." . "<br>";
            }
        }
        ?>
	</form>
</body>
</html>
