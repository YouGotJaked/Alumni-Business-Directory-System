<!--The business list page sorts the current businesses under the searched category. If a user wishes to view more information on a particular business, they can click the link and be taken to a page displaying greater detail on the particular business-->
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

	<?php
	include "../src/business.php";

    // Verify user is logged in
    if (!$_SESSION['login']) {
        header('Location: login.php');
    }

	$business = new Business();

	$name = "";
	$category = "";
	$city = "";

	if (isset($_POST['submit'])) {
		if (isset($_POST['name'])) {
			$name = $_POST["name"];
		} else {
			$name = "";
		}

		if (isset($_POST['category'])) {
			$category = $_POST["category"];
		} else {
			$category = "";
		}

		if (isset($_POST['city'])) {
			$city = $_POST["city"];
		} else {
			$city = "";
		}
	}

	$approved = $business->get_all("status", "Approved");

	?>

	<script>
		$(function () {
			var approved = <?php echo $approved; ?>;
			var name = "<?php echo $name; ?>"
			var category = "<?php echo $category; ?>"
			var city = "<?php echo $city; ?>"

			populateBusinessList(approved, name, category, city)
		});
	</script>
</body>
</html>
