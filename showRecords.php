<?php
include('dbConnection.php');
$sql = "SELECT * FROM Syllabus";
$result = $connection->query($sql);
$syllabusList = [];
$numberOfRows = $result->num_rows;
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
