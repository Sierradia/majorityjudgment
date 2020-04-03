<?php
	include("../header.php");
?>
<body>
	<?php
		include("../nav.php");
	?>
	<p class="badge_code" id="code_fixed">Code : 
		<span class="badge badge-secondary">
			<?php 
				session_start();
				if (!isset($_GET["code"])){
					header("Location : http://www.majorityjudgment.com/");
				}else{
					$_SESSION["code"] = $_GET["code"];
					echo $_SESSION["code"]; 
				}
				
			?>
		</span>
	</p>
	<div class="container">

		<div class = "section">
			
			<div class="form">
			
				<?php
					require_once("../database.php");
					$database = new DatabaseConnector;
					$proposals = $database->get_all_proposals_by_survey_code($_GET["code"]);
					foreach ($proposals as $value) {

						echo ("

						<div id='".$value['id']."' class='card mb-4 shadow mb-5'>
			                <div class='card-body d-flex flex-column'>
			                    <div>
			                    	<h5>".$value["value"]."</h5>
			                        <hr>
			                    </div>
			                    <div class='row mt-3'> 
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_0' class='mention rejected m-auto d-block pointer'>
		                                	<span>A Rejeter</span>
		                                </div>

			                        </div>
			                    
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_1' class='mention insufficient m-auto d-block pointer'>
		                                	<span>Insuffisant</span>
		                                </div>
			                        </div>
			                    
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_2' class='mention acceptable m-auto d-block pointer'>
		                                	<span>Passable</span>
		                                </div>
			                        </div>
			                    
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_3' class='mention pretty-good m-auto d-block pointer'>
		                                	<span>Assez Bien</span>
		                                </div>
			                        </div>
			                    
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_4' class='mention good m-auto d-block pointer'>
		                                	<span>Bien</span>
		                                </div>
			                        </div>
			                    
			                        <div class='col-4 col-md-4 col-lg-2 p-0 text-center mb-4'>
		                                <div id='".$value['id']."_5' class='mention very-good m-auto d-block pointer'>
		                                	<span>Très Bien</span>
		                                </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
							");
					}
				?>
				<div class="col-12 pb-5 text-center mt-5">
					<button class="btn btn-success" id ="submit"><i class="fa fa-check mr-2"></i> Valider</button>
				</div>
			</div>

			
			
		</div>
	</div>

</body>
</html>