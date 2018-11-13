<!doctype html>
<html>
<head>
	<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
	<nav class="navbar navbar-expand">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navbutton" href=
                    <?php
                        session_start();
                        if ($_SESSION['role'] == "Manager") {
                            echo "manager_home.php";
                        } else {
                            echo "user_home.php";
                        }
                    ?>
                >Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="submit_business.php">Submit Business</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
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
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<form class="container col-8" method="post" action="submit_business.php">
  		<div class="form-row mb-3">
    		<div class="col">
				<label for="validationServer01">Business Name</label>
      			<input type="text" name="name" class="form-control" placeholder="Business Name" required>
    		</div>
  		</div>
		<div class="form-row mb-3">
			<div class="form-group col">
    			<label for="exampleFormControlTextarea1">Business Description</label>
    			<textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Business Description..." required></textarea>
  			</div>
		</div>
		<div class="form-row mb-3">
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
		<div class="form-row mb-3">
			<div class="col">
				<label for="validationServer01">Street</label>
      			<input type="text" name="street" class="form-control" placeholder="Street" required>
    		</div>
			<div class="col-4">
				<label for="validationServer01">City</label>
      			<input type="text" name="city" class="form-control" placeholder="City" required>
    		</div>
			<div class="col-2">
				<label for="validationServer01">State</label>
      			<input type="text" name="state" class="form-control" placeholder="State" required>
    		</div>
		</div>
		<div class="form-row mb-3">
			<div class="col-4">
				<label for="validationServer01">Zip Code</label>
      			<input type="text" name="zip" class="form-control" placeholder="Zip Code" required>
    		</div>
			<div class="col">
				<label for="validationServer01">Country</label>
      			<input type="text" name="country" class="form-control" placeholder="Country" required>
    		</div>
		</div>
		<input type="submit" class="btn btn-primary mb-4" name="submit">
        <?php
        require_once "../src/business.php";
        require_once "../src/user.php";
            
        // Verify user is logged in
        if (!$_SESSION['login']) {
            header('Location: login.php');
        }
        
        if (isset($_POST["submit"])) {
            $business = new Business();
            $user = new User();
            // check if business already exists??
            
            // get id of current user
            /*
            $json = $user->get_one("id", $_SESSION['user']);
            $json_obj = json_decode($json);
            $owner_id = $json_obj[0]->id;
            */
            
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
                echo "Business request sent for approval.";
            }
        }
        ?>
	</form>
</body>
</html>
