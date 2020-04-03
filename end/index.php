<?php
	include("../header.php");
?>
<body>

	<?php
		include("../nav.php");
	?>
	<div class="container">
		<div class = "section">
			<h2 class = "feedback">Terminer un vote</h2>
			<div class="row">
				<div class="col-12 offset-xl-2  col-md-7 col-xl-6">
	                <input id ="end_code" type="text" class="form-control w-100" placeholder="Code du vote">
	                <div class="invalid-feedback">Le code est incorrect</div>
	            </div>
	            <div class="col-12 col-md-5 col-xl-2">
	                <button type="submit" class="btn btn-primary w-100  mt-2 mt-md-0 pr-md-1 pl-md-1" id ="end"><i class="fa fa-times"></i>Terminer le vote</button>
	            </div>
	        </div>
		</div>
	</div>
</body>
</html>