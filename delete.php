<?php
include('dbConnection.php');
$id = $_POST["id"];
$sql = "UPDATE Syllabus SET Status = 0 WHERE id = " . $id;
$result = $connection->query($sql);
if($result) {
	$response = 1;
}
else {
	$response = 0;
}
echo $response;
$connection->close();
?>
