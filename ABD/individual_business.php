<!doctype html>
<html>
<head>
	<link href="styles.css" rel="stylesheet" type="text/css"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="scripts.js"></script>
    <title>Alumni Business Directory</title>
</head>

<body>
    <nav class="navbar navbar-expand">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link navbutton" href="user_home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="submit_business.php">Submit Business</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link" style="color: white" href="#">Name</span>
            </li>
            <li class="nav-item">
                <a class="nav-link navbutton" href="login.php">Logout</a>
            </li>
        </ul>
	</nav>
	<div class="jumbotron">
		<h1>Santa Clara University Business Directory</h1>
	</div>
	<div class="container text-center">
		<h1 id="business-name"></h1>
		<p id="business-description" class="col-6 mx-auto"></p>
		<div id="business-category"></div>
        <div id="business-street"></div>
        <div id="business-city"></div>
        <div id="business-state"></div>
        <div id="business-zip"></div>
        <div id="business-country"></div>
	</div>
    <script>
        $(function () {
            populateIndividualBusinessFields(<?php echo json_encode($_POST); ?>)
        });
    </script>
</body>
</html>
