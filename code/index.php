<?php 
session_start();
if (!isset($_SESSION["code"]))
	header("Location : http://www.majorityjudgment.com/");
?>
<?php
	include("../header.php");
?>
<body>

	<?php
		include("../nav.php");
	?>
	<div class="container">
		<div class = "section col-lg-8 col-md-8">
			<h2 class = "feedback">Nouveau vote enregistré !!</h2>
			<div class="col-12 col-md-8 col-xl-5 center">
                <p class="badge_code">Code : <span class="badge badge-secondary"><?php echo $_SESSION["code"];?></span></p>
                
            </div>
			<div class="col-12 col-md-8 col-xl-5 center mt-5">
				<?php
					echo "<a class ='btn btn-primary w-100 mt-2 mt-md-0 pr-md-1 pl-md-1' href='../answer?code=".$_SESSION["code"]."'><i class='fa fa-sign-in'></i>Répondre au vote</a>";
				?>
            </div>
			
		</div>
	</div>
	
</body>
</html>