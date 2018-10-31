<!doctype html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title>Alumni Business Directory</title>
</head>

<body>
	<nav class="navbar navbar-toggleable-md container-fluid">
  		<a href="manager_home.php" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit_business.php"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
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
