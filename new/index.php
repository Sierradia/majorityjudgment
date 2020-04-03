<?php
	include("../header.php");
?>
<body>
	<?php
		include("../nav.php");
	?>
	
	<div class="container">
		<div class = "section col-lg-8 col-md-8">
			<div class="form-group">
				<div id = "proposals" >
					<div class="d-flex flex-row justify-content-start mb-4 item_proposal">
						<div class="d-flex flex-column justify-content-center">
	                        <span class="badge badge-secondary"><h3 class="title m-0 number_proposal">01</h3></span>
	                    </div>
	                    <div class="flex-grow-1 pl-4 pr-4">
	                        <input type="text" class="form-control" placeholder="Proposition ...">
	                        <div class="invalid-feedback">Veuillez entrer une proposition</div>
	                    </div>
	                    <div class="d-flex flex-column justify-content-center">
	                        <button type="button" class="btn btn-outline-danger btnRemoveChoice"><i class="fa fa-trash"></i></button>
	                    </div>
	                </div>
	                <div class="d-flex flex-row justify-content-start mb-4 item_proposal">
						<div class="d-flex flex-column justify-content-center">
	                        <span class="badge badge-secondary"><h3 class="title m-0 number_proposal">02</h3></span>
	                    </div>
	                    <div class="flex-grow-1 pl-4 pr-4">
	                        <input type="text" class="form-control" placeholder="Proposition ...">
	                        <div class="invalid-feedback">Veuillez entrer une proposition</div>
	                    </div>
	                    <div class="d-flex flex-column justify-content-center">
	                        <button type="button" class="btn btn-outline-danger btnRemoveChoice"><i class="fa fa-trash"></i></button>
	                    </div>
	                </div>
		        </div>
	            <div class="my-2 col-12 col-md-5 col-xl-2 center btn-circle">
					<button id = "add_input_text" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-plus"></i></button>
				</div>
				<div class="col-12 pb-5 text-center mt-5">
                    <button class="btn btn-success" id ="submit_button"><i class="fa fa-check mr-2"></i> Valider</button>
                    <div id = "too_few_proposals" class="invalid-feedback">Veuillez saisir au moins deux propositions</div>
                </div>

			</div>
		</div>
	</div>
</body>
</html>