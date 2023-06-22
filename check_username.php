<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AUA";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['username'];

  $username_query = "SELECT COUNT(*) AS count FROM user_details WHERE username='$username'";
  $result = $conn->query($username_query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
      $response = array('exists' => true, 'error' => 'Username already exists.');
    } else {
      $response = array('exists' => false);
    }
  } else {
    $response = array('error' => 'Error executing the query.');
  }

  echo json_encode($response);
}

$conn->close();
?>
