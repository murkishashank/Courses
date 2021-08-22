<?php
include('dbConnection.php');
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
if($input) {
	$userID = $_SESSION['USERID'];
	$title = $input["title"];
	$description = $input["description"];
	$tags = $input["tags"];
	$sql = "INSERT INTO Syllabus (UserID, Title, Description, Tags, Status) VALUES(" . $userID  . ", '" . $title . "', '" . $description . "', '" . $tags . "', 1)";
	$result = $connection->query($sql);
	if($result){
		http_response_code(201);
		$id = $connection->insert_id;
		$responseResult = $connection->query("SELECT * FROM Syllabus WHERE id=" . $id);
		$row = $responseResult->fetch_assoc();
		$obj = new stdClass();
		$obj->id = $row["id"];
		$obj->title = $row["Title"];
		$obj->description = $row["Description"];
		$obj->tags = $row["Tags"];
		$obj->status = $row["Status"];
		$syllabusItem = $obj;
		$response = json_encode($syllabusItem);
		echo $response;
	}
	else{
		// echo $connection->error . " Sql Error " . $sql;
		http_response_code(500);
	}
}
else {
	// echo "Input error";
	http_response_code(400);
}
$connection->close();
?>
