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
		$syllabusItem = new stdClass();
		$syllabusItem->id = $row["id"];
		$syllabusItem->title = $row["Title"];
		$syllabusItem->description = $row["Description"];
		$syllabusItem->tags = $row["Tags"];
		$syllabusItem->status = $row["Status"];
		$syllabusItem = json_encode($syllabusItem);
		echo $syllabusItem;
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
