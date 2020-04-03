<?php
session_start();
require_once("database.php");

$database = new DatabaseConnector;

$data = [];

if (isset($_POST["action"])){
	switch ($_POST["action"]) {
		case 'save_code':
			$_SESSION["code"] = $_POST["code"];
			$data = true;
			break;
		case 'is_code_valid':
			$data = $database->is_code_valid($_POST["code"]);
			break;
		case 'is_code_exists':
			$data = $database->is_code_exists($_POST["code"]);
			if ($data)
				$_SESSION["code"] = $_POST["code"];
			break;
		case 'new_survey':
			// Generating the infos of the survey
			$code = generate_code(4);

			if($database->add_survey($code)){
				$data["code"] = $code;
			}

			$_SESSION["code"]=$code;
			break;
		case 'add_response':
			$data = $database->add_response($_POST["id"],$_POST["value"]);
			break;
		case 'add_proposal':
    		$data = $database->add_proposal($_SESSION["code"],$_POST["value"]);
    		break;
    	case 'get_code':
    		$data = $_SESSION["code"];
    		break;
    	
		
	}
}

header('Content-Type: application/json');
echo json_encode($data);
exit();




function generate_code($length){

	$database = new DatabaseConnector;

	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	$code = substr(str_shuffle($chars),0,$length);

	while ($database->is_code_exists($code)){
		$code = substr(str_shuffle($chars),0,$length);
	}

	return $code;
}

