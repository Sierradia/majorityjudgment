<?php
	include("../utils.php");
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
		<div class="section">
			
			<h2 class = "feedback">Résultats du vote</h2>

			<?php
			require_once("data.php");
			$results = get_results_proposal_median();
			$mentions_class = ["very-good","good","pretty-good","acceptable","insufficient","rejected"];
			$mentions = ["Très bien","Bien","Assez bien","Passable","Insuffisant","A rejeter"];
			$count = 1;
			foreach ($results as $value) {
				echo ('<div class="card mb-4   shadow p-3 mb-5 bg-white rounded align-self-stretch">
					<div class="card-body d-flex flex-column justify-content-between">
					    <div>
					   		<div class="d-flex flex-column justify-content-center">
		                        <span class="badge badge-secondary little"><h3 class="title m-0 number_proposal">'.two_chars_number($count).'</h3></span>
		                    </div>
					    	<h5 class="card-title title mt-0 ">'.$value["title"].'</h5>
					        <p class="card-text mt-2 mb-2"> </p>
					        <table style="width:100%;" cellpadding="0" cellspacing="0">
					            <tbody>
					            	<tr>');
										$amount = 0;
					            		for ($i=0; $i < sizeof($value["values"]); $i++) { 

					            			if (($value["values"][$i]-$amount)>0)
					            				echo '<td width = "'.($value["values"][$i]-$amount).'%" class="selected gauge_satisfaction_item '.$mentions_class[$i].'" data-toggle="tooltip" title="'.$mentions[$i].'"></td>';
					            			$amount = $value["values"][$i];
					                    }
					                echo('</tr>
					        	</tbody>
					        </table>
					        <table style="width:100%;" cellpadding="0" cellspacing="0">
					            <tbody>
					            	<tr>
					            		<td style="width:30%;text-align:left;">0%</td>
					                    <td style="width:40%;text-align:center;">50%</td>
					                    <td style="width:30%;text-align:right;">100%</td>
					                </tr>
					            </tbody>
					        </table>
					        <p class="mt-2">
					        	<small class="text-muted">Mention de la proposition : "'.$mentions[$value["mention"]].'"</small>
					        </p>

					    </div>
					</div>
				</div>');
	        $count++;
			}
		    
			?>
		</div>
	</div>
</body>
</html>
