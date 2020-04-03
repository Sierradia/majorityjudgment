<?php
	include("../header.php");
    session_start();
    if (!isset($_SESSION["code"]))
        header("Location : http://www.majorityjudgment.com/");
?>
<body>
	<?php
		include("../nav.php");
	?>
	<div class="container">
		<div class = "section">
			<h2 class = "feedback">Réponses enregistrées !!</h2>

			<div class="col-12 col-md-8 col-xl-5 center">
                <button class="btn btn-primary w-100  mt-2 mt-md-0 pr-md-1 pl-md-1" id ="new_response"><i class="fa fa-sign-in"></i>Nouvelle réponse</button>
            </div>

            <div class="col-12 text-center pt-2">
                <p></p><h6 class="text-muted">OU</h6><p></p>
            </div>

            <div class="col-12 col-md-8 col-xl-5 center">
                <button type="submit" class="btn btn-primary w-100  mt-2 mt-md-0 pr-md-1 pl-md-1" id ="end_survey"><i class="fa fa-times"></i>Terminer le vote</button>
            </div>

            <div class="col-12 col-md-8 col-xl-5 center">
                <p class="badge_code">Code : <span class="badge badge-secondary mt-5"><?php echo $_SESSION["code"];?></span></p>
                
            </div>

		</div>
	</div>
</body>
</html>