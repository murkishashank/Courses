<?php
include('dbConnection.php');
$id = $_POST["id"];
$title = $_POST["title"];
$description = $_POST["description"];
$tags = $_POST["tags"];
$status = $_POST["status"];
$sql = "REPLACE INTO Syllabus VALUES(" . $id . ", '" . $title . "', '" . $description . "', '" . $tags . "', " . $status .")";
$result = $connection->query($sql);
if ($result) {
	$response = 1;
} else {
	$response = 0;
	//echo "Error: " . $sql . "<br>" . $connection->error;
}
echo $response;
$connection->close();
?>
