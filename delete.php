<?php
include('dbConnection.php');
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
if($input) {
	$id = $input["id"];
	$selectResult = $connection->query("SELECT id FROM Syllabus WHERE id = " . $id);
	$count = $selectResult->num_rows;
	if($count > 0) {
		$sql = "UPDATE Syllabus SET Status = 0 WHERE id = " . $id;
		$result = $connection->query($sql);
		if($result) {
			http_response_code(204);
		}
		else {
			http_response_code(400);
		}
	}
	else {
		http_response_code(404);
	}
}
else {
	http_response_code(400);
}
$connection->close();
?>