<?php

session_start();
require_once("../database.php");


$database = new DatabaseConnector;

$data = [];

if (isset($_POST["action"])&&isset($_SESSION["code"])){
	if ($_POST["action"] == 'get_results'){
		$data = $database->get_results_proposal($_SESSION["code"]);
		$data = get_median($data);
	}
}

// Set disable the survey, get the responses and sort results
function get_results_proposal_median(){
	$database = new DatabaseConnector;
	$data = $database->set_active_survey(false,$_SESSION["code"]);
	$data = $database->get_results_proposal($_SESSION["code"]);
    $data = get_median($data);
    return $data;
}

function get_median ($tab){
	$grouped_tab = [];

	// Sum the responses and sort them by proposal
	foreach ($tab as $value) {
		if (!isset($grouped_tab[$value["id"]])){
			$grouped_tab[$value["id"]] = ["title"=>$value["value"], "values"=>[0,0,0,0,0,0]];
		}
		$grouped_tab[$value["id"]]["values"][$value["grade"]]++;	
	}

	// Calculate cumulative frequencies, get score and mention
	foreach ($grouped_tab as $key => $value) {
		$sum = 0;
		$number_of_responses = array_sum($value["values"]);
		$reverse_array = array_reverse($value["values"]);
		for ($i=0; $i < sizeof($value["values"]) ; $i++) { 
			$sum += $reverse_array[$i] / $number_of_responses * 100;
			$grouped_tab[$key]["values"][$i] = $sum;
			// Round to avoid precision issues
			if (round($sum,2)>=50 && !isset($grouped_tab[$key]["score"])){
				// Mention is the class selected by at least 50% of people (0 : best, 5 : worst)
				$grouped_tab[$key]["mention"] = $i;
				// Score is the frequency of people who vote for the mention or better
				$grouped_tab[$key]["score"] = round($sum,2);
			}
		}
	}

	usort($grouped_tab,"sort_proposals");
	return $grouped_tab;
}

function sort_proposals ($a,$b){
	// Sort by mention
	if ($a["mention"]>$b["mention"]){
		// Change order
		return 1;
	}else if ($a["mention"]<$b["mention"]){
		return -1;
	}
	// Sort by score
	else if ($a["score"]<$b["score"]){
		return 1;
	} else if ($a["score"]>$b["score"]){
		return -1;
	} 
	// Sort from worst to better with the frequencies
	else {
		for ($i=5; $i >= 0; $i--) { 
			if (round($a["values"][$i],2)<round($b["values"][$i],2)){
				return 1;
			}else if (round($a["values"][$i],2)>round($b["values"][$i],2)){
				return -1;
			}
		}
	}
	return 0;
}


	  