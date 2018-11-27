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
                <a class="navbar-brand mr-2" href="submit_business.php"><button class="btn btn-sm btn-outline-light">Submit Business</button></a>
            </li>
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

    <?php
    include "../src/business.php";
    include "../src/user.php";
        
    // Verify user is logged as owner
    if (!$_SESSION['login']) {
        header('Location: login.php');
    } else if ($_SESSION['role'] != "Owner") {
        header('Location: user_home.php');
    }
    $business = new Business();
    $user = new User();
    
    $business_id = json_decode($user->get_one("id", $_SESSION['user']))[0]->business_id;
    $busn = json_decode($business->get_one("id", $business_id))[0];
    ?>

	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<div class="card">
 		<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Edit Business</h3>
  		<form class="card-body" method="post" action="edit_business.php">
    		<div id="table" class="table-editable">
				<table class="table table-bordered table-responsive-md table-hover text-center">
       			<tr>
          			<th class="text-center">Business Name</th>
					<th class="text-center">Description</th>
                    <th class="text-center">Category</th>
					<th class="text-center">Street</th>
                    <th class="text-center">City</th>
                    <th class="text-center">State</th>
                    <th class="text-center">Zip</th>
                    <th class="text-center">Country</th>
          			<th class="text-center">Update</th>
       		 	</tr>
        		<tr>
          			<td>
                        <input type="text" name="name" value='<?= $busn->name ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="description" value='<?= $busn->description ?>'>
                    </td>
          			<td class="pt-3-half">
                        <input type="text" name="category" value='<?= $busn->category ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="street" value='<?= $busn->street ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="city" value='<?= $busn->city ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="state" value='<?= $busn->state ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="zip" value='<?= $busn->zip ?>'>
                    </td>
                    <td class="pt-3-half">
                        <input type="text" name="country" value='<?= $busn->country ?>'>
                    </td>
          			<td>
                        <input type="submit" class="btn btn-primary mb-4" name="update" value="Update">
                    </td>
        		</tr>
      		    </table>
    		</div>
            <?php
            echo $_POST["name"];
            echo $busn->status;
            if (isset($_POST["update"]))  {
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
                    echo "Business updated" . "<br>";
                } else {
                    echo "Business failed to update" . "<br>";
                }
            }
            ?>
  		</form>
	</div>
</body>
</html>
