<!DOCTYPE html>
<html>
<head>
	<title>Jugement majoritaire</title>
	<link rel="icon" href="../images/icon.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="script.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>

	<?php
		include("nav.php");
	?>
	<div class="container">
		<div class="section">
			<img src="http://www.majorityjudgment.com/images/title.png" class="mb-5" id="home_logo">

			<div class="row">
	            <div class="col-12 offset-xl-2  col-md-7 col-xl-6">
	                <input id ="join_code" type="text" class="form-control w-100" placeholder="Code du vote">
	                <div class="invalid-feedback">Le code est incorrect</div>
	            </div>
	            <div class="col-12 col-md-5 col-xl-2">
	                <button type="submit" class="btn btn-primary w-100  mt-2 mt-md-0 pr-md-1 pl-md-1" id ="join"><i class="fa fa-sign-in"></i>Rejoindre</button>
	            </div>
	            <div class="col-12 text-center pt-2">
	                <p></p><h6 class="text-muted">OU</h6><p></p>
	            </div>

	            <div class="col-12 col-md-5 col-xl-2 center">
	                <button type="submit" class="btn btn-primary w-100" id = "new_survey_button"><i class="fa fa-plus"></i>Nouveau vote</button>
	            </div>
	        </div>
		</div>
	</div>

</body>
</html>