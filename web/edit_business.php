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
                <a class="nav-link navbutton" href="login.php">Logout</a>
            </li>
        </ul>
		</div>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<div class="card">
 		<h3 class="card-header text-center font-weight-bold text-uppercase py-4">Businesses</h3>
  		<div class="card-body">
    		<div id="table" class="table-editable">
				<table class="table table-bordered table-responsive-md table-hover text-center">
       			<tr>
          			<th class="text-center">ID</th>
          			<th class="text-center">Business Owner</th>
          			<th class="text-center">Business Name</th>
          			<th class="text-center">Type of Business</th>
					<th class="text-center">Description</th>
					<th class="text-center">Address</th>
          			<th class="text-center">Remove</th>
       		 	</tr>
        		<tr>
          			<td class="pt-3-half" contenteditable="true">1</td>
          			<td class="pt-3-half" contenteditable="true">Ben Bronco</td>
          			<td class="pt-3-half" contenteditable="true">Ben's Burritos</td>
          			<td class="pt-3-half" contenteditable="true">Restaurant</td>
					<td class="pt-3-half" contenteditable="true">Short description for Ben's Burritos. This place is pretty good.</td>
					<td class="pt-3-half" contenteditable="true">500 El Camino Real, Santa Clara, CA 95053, USA</td>
          			<td>
            			<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
          			</td>
        		</tr>
      		</table>
    		</div>
  		</div>
	</div>
</body>
</html>
