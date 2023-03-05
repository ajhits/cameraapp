<?php
// Retrieve image data from request body
$data = json_decode(file_get_contents('php://input'), true);
$image = $data['image'];

// Connect to MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "images";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Insert image data into database
$sql = "INSERT INTO img (image) VALUES ('$image')";
if (mysqli_query($conn, $sql)) {
  $response = array('success' => true);
} else {
  $response = array('success' => false, 'error' => mysqli_error($conn));
}
mysqli_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
