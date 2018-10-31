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
  		<a href="user_home.php" class="homebutton">HOME</a>
		<a class="navbar-brand navbar-right postbusiness" href="submit_business.php"><button class="btm btn-sm btn-outline-light">Submit Business</button></a>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<form class="container col-8">
  		<div class="form-row mb-3">
    		<div class="col">
				<label for="validationServer01">Business Name</label>
      			<input type="text" class="form-control" placeholder="Business Name" required>
    		</div>
  		</div>
		<div class="form-row mb-3">
			<div class="form-group col">
    			<label for="exampleFormControlTextarea1">Business Description</label>
    			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Business Description..." required></textarea>
  			</div>
		</div>
		<div class="form-row mb-3">
    		<label for="exampleFormControlSelect1">Type of Business</label>
    		<select class="form-control" id="exampleFormControlSelect1" required>
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
      			<input type="text" class="form-control" placeholder="Street" required>
    		</div>
			<div class="col-4">
				<label for="validationServer01">City</label>
      			<input type="text" class="form-control" placeholder="City" required>
    		</div>
			<div class="col-2">
				<label for="validationServer01">State</label>
      			<input type="text" class="form-control" placeholder="State" required>
    		</div>
		</div>
		<div class="form-row mb-3">
			<div class="col-4">
				<label for="validationServer01">Zip Code</label>
      			<input type="text" class="form-control" placeholder="Zip Code" required>
    		</div>
			<div class="col">
				<label for="validationServer01">Country</label>
      			<input type="text" class="form-control" placeholder="Country" required>
    		</div>
		</div>
		<button class="btn btn-primary mb-3" type="submit">Submit</button>
	</form>
</body>
</html>
