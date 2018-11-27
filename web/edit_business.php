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

    <?php
    include "../src/business.php";
    include "../src/user.php";
        
    // Verify user is logged as owner
    if (!$_SESSION['login']) {
        header('Location: login.php');
    } else if ($_SESSION['role'] == "Visitor") {
        header('Location: user_home.php');
    } else if ($_SESSION['role'] == "Manager") {
        header('Location: manager_home.php');
    }
        
    $business = new Business();
    $user = new User();
    
    $business_id = json_decode($user->get_one("id", $_SESSION['user']))[0]->business_id;
    $busn = json_decode($business->get_one("id", $business_id))[0];
    ?>

	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
        <form class="container col-lg-8" method="post" action="edit_business.php">
            <div class="form-row">
                <div class="col-lg col-sm-12 mb-3">
                    <label for="validationServer01">Business Name</label>
                    <input type="text" name="name" class="form-control" value='<?php htmlentities($busn->name, ENT_QUOTES); ?>'>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-lg col-sm-12 mb-3">
                    <label for="exampleFormControlTextarea1">Business Description</label>
                    <textarea class="form-control" name="description"><?= $busn->description ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg col-sm-12 mb-3">
                    <label for="exampleFormControlSelect1">Type of Business</label>
                    <select class="form-control" name="category" id="category">
                        <option <?php if ($busn->category == "Restaurant") echo 'selected' ; ?>>Restaurant</option>
                        <option <?php if ($busn->category == "Shopping") echo 'selected' ; ?>>Shopping</option>
                        <option <?php if ($busn->category == "Professional Services") echo 'selected' ; ?>>Professional Services</option>
                        <option <?php if ($busn->category == "Local Services") echo 'selected' ; ?>>Local Services</option>
                        <option <?php if ($busn->category == "Home Services") echo 'selected' ; ?>>Home Services</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg col-sm-12 mb-3">
                    <label for="validationServer01">Street</label>
                    <input type="text" name="street" class="form-control" value='<?= $busn->street ?>'>
                </div>
                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="validationServer01">City</label>
                    <input type="text" name="city" class="form-control" value='<?= $busn->city ?>'>
                </div>
                <div class="col-lg-2 col-sm-12 mb-3">
                    <label for="validationServer01">State</label>
                    <input type="text" name="state" class="form-control" value='<?= $busn->state ?>'>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 col-sm-12 mb-3">
                    <label for="validationServer01">Zip Code</label>
                    <input type="text" name="zip" class="form-control" value='<?= $busn->zip ?>'>
                </div>
                <div class="col-lg col-sm-12 mb-3">
                    <label for="validationServer01">Country</label>
                    <input type="text" name="country" class="form-control" value='<?= $busn->country ?>'>
                </div>
            </div>
            <input type="submit" class="btn btn-primary mb-4" name="submit">
            <?php
            if (isset($_POST["submit"]))  {
                $json = ['name' => $_POST["name"],
                'status' => $busn->status,
                'description' => $_POST["description"],
                'category' => $_POST["category"],
                'street' => $_POST["street"],
                'city' => $_POST["city"],
                'state' => $_POST["state"],
                'zip' => $_POST["zip"],
                'country' => $_POST["country"],
                'owner_id' => $busn->owner_id];
        
                $json_obj = json_encode($json, JSON_PRETTY_PRINT);
                $update_busn = $business->update_all_values($business_id, $json_obj);
        
                if ($update_busn) {
                    echo "<br>" . "Business updated." . "<br>";
                } else {
                    echo "<br>" . "Business failed to update." . "<br>";
                }
            }
            ?>
  	</form>
</body>
</html>
