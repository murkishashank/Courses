<?php
include('dbConnection.php');
$sql = "SELECT * FROM Syllabus WHERE Status = 1 AND userID = " . $_SESSION['USERID'];
$result = $connection->query($sql);
$syllabusList = [];
while($row = $result->fetch_assoc()) {
	$obj = new stdClass();
	$obj->id = $row["id"];
	$obj->title = $row["Title"];
	$obj->description = $row["Description"];
	$obj->tags = $row["Tags"];
	$obj->status = $row["Status"];
	$syllabusList[] = $obj;
}
$response = json_encode($syllabusList);
echo $response;
?>