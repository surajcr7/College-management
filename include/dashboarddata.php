<?php
header('Content-Type: application/json');

require_once('conn.php');

$sqlQuery = "SELECT * FROM STUDENT ";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>