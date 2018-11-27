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
  		<div class="card-body">
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
          			<td class="pt-3-half" contenteditable="true"><?= $busn->name ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->description ?></td>
          			<td class="pt-3-half" contenteditable="true"><?= $busn->category ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->street ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->city ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->state ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->zip ?></td>
                    <td class="pt-3-half" contenteditable="true"><?= $busn->country ?></td>
          			<td>
                        <form method="post" action="">
            			    <span class="table-update"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0" name="update">Update</button></span>
                        </form>
          			</td>
        		</tr>
      		</table>
    		</div>
  		</div>
	</div>
    <?php
    if (isset($_POST['update']))  {
        echo $busn . "<br>";
        //$business->update_all_values($business_id, $json);
    }
    ?>
</body>
</html>
