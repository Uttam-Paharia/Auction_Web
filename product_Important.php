<?php
echo "PHP file executed";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "AUA";

// CREATE CONNECTION
$conn = new mysqli($servername, $username, $password, $databasename);

// GET CONNECTION ERRORS
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
$bid=$_POST['inputField'];
// SQL QUERY
$current_price;
$base_price;


$query = "SELECT current_price ,base_price FROM `objects` WHERE product_id='blah@16'";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    // OUTPUT DATA OF THE ROW
    $row = $result->fetch_assoc();

    $current_price = $row['current_price'];
    $base_price = $row['base_price'];


} else {
    echo "No data found.";
}
$min_price;
if ($current_price)
{
    $min_price=$current_price+$base_price*0.1;
}
else
{
    $min_price=$base_price;
}
if($bid<$min_price){
    echo "false@".$current_price;
}
else{
    echo "true";
}

?>
