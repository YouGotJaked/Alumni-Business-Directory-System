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
	<div class="card border-dark mb-3 mx-auto" style="max-width: 18rem;">
  		<div class="card-header">Business Name: </div>
 		<div class="card-body text-dark">
    		<p class="card-text">Business Owner: </p>
			<p class="card-text">Business Description: </p>
			<p class="card-text">Owner Email: </p>
			<p class="card-text">Degree: </p>
			<p class="card-text">Graduation Year: </p>
			<p class="card-text">Street: </p>
			<p class="card-text">City: </p>
			<p class="card-text">State: </p>
			<p class="card-text">Zip Code: </p>
			<p class="card-text">Country: </p>
		<div class="card-footer bg-transparent">
			<div class="form-check">
  				<input class="form-check-input" type="radio" name="card1" value="confirm">
  				<label class="form-check-label" for="exampleRadios1">Confirm</label>
			</div>
			<div class="form-check">
  				<input class="form-check-input" type="radio" name="card1" value="deny">
  				<label class="form-check-label" for="exampleRadios2">Deny</label>
			</div>
		</div>
  		</div>
	</div>
</body>
</html>
