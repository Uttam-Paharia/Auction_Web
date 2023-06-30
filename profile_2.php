<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$servername = "localhost";
$password = "";
$databasename = "AUA";

// CREATE CONNECTION
$conn = new mysqli($servername, "root", $password, $databasename);

// GET CONNECTION ERRORS
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>



<?php
// SQL QUERY
$done=false;
$error=false;
$name;
$total_shells;
$bidded_shells;
$unbidded_shells;
$email;
$phone;
$address;
$profile_username = $_SESSION['username'];

$query = "SELECT name ,total_shells, bidded_shells, unbidded_shells,email,phone ,address FROM `user_details` WHERE username='$profile_username'";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

if ($result === false) {
  die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
  // OUTPUT DATA OF THE ROW
  $row = $result->fetch_assoc();

  // Print the values of total_shells, bided_shells, and unbided_shells
  $name = $row['name'];
  $total_shells = $row['total_shells'];
  $bidded_shells = $row['bidded_shells'];
  $unbidded_shells = $row['unbidded_shells'];
  $email = $row['email'];
  $phone = $row['phone'];
  $address = $row['address'];

} else {
  echo "No data found.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">

  <link rel="stylesheet" href="profile_2.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css?v=<?php echo time(); ?>" />
  <script src="https://kit.fontawesome.com/4a8a1a882e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="projectimages/logo-white.png"><img src="projectimages/logo-white.png" width="50"
        height="50" alt="logo_image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bid_page_3.php">Bid </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="sell_page_4.php">Sell</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="profile_2.php" title="<?php echo "Hello ".$_SESSION['username']; ?>"><span class="sr-only">(current)</span><i class="fa-solid fa-user" style="color: #99c1f1;font-size:30px;"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="main">
    <div class="initial">
      <p id="initial">A</p>
    </div>
    <div class="info">
      <div class="container">
        <div class="item">
          <p>Name</p>
        </div>
        <div id="Name">
          <p>
            <?php echo $name ?>
          </p>
        </div>
        <div class="item">
          <p>Total Shells</p>
        </div>
        <div id="Total_shells">
          <p>
            <?php echo $total_shells ?>
          </p>
        </div>
        <div class="item">
          <p>Bid Shells</p>
        </div>
        <div id="bid_shells">
          <p>
            <?php echo $bidded_shells ?>
          </p>
        </div>
        <div class="item">
          <p>Unbid Shells</p>
        </div>
        <div id="unbid_shells">
          <p>
            <?php echo $unbidded_shells ?>
          </p>
        </div>
        <div class="item">
          <p>Email</p>
        </div>
        <div id="email">
          <p>
            <?php echo $email ?>
          </p>
        </div>
        <div class="item">
          <p>Phone</p>
        </div>
        <div id="phone">
          <p>
            <?php echo $phone ?>
          </p>
        </div>
        <div class="item">
          <p>Address</p>
        </div>
        <div id="address">
          <p>
            <?php echo $address ?>
          </p>
        </div>
       <a href="history.php"> <button style="width:10vw;margin-top:10px; padding:5px;" >history</button></a>

      </div>
    </div>
  </div>
  <div class="black">
    <div class="gridd">
    <div>
      <img src="projectimages/withdraw.png" id="withdraw" height=300px title="CLick to withdraw" onclick="withdraw()">
    </div>
    <div>
      <img src="projectimages/deposit.png" id="deposit" height=300px title="Click to deposit" onclick="deposit()">
    </div>
    <div>
      <p style="margin-left:27vw;color:white;font-size:25px;" >Withdraw</p>
    </div>
    <div>
      <p style="margin-left:27vw;color:white;font-size:25px;" >Deposit</p>

    </div>
</div>
    <div id="form">
      <form id="myForm" method="POST">
        
      </form>
    </div>

    </div>
  <script>
    let username = "<?php echo $profile_username; ?>";
    //   document.getElementById('username_display').innerHTML="<span style='font-weight:bold;'>USERNAME:</span> "+username;
    document.getElementById('initial').innerHTML = username[0].toUpperCase();
  </script>
  <script>
function withdraw(){
  let text='<input type="text" id="inputField" placeholder="Enter a value" name="withdraw"><button type="submit" >Withdraw</button>';
  document.getElementById('myForm').innerHTML=text;
}
function deposit(){
  let text='<input type="text" id="inputField" placeholder="Enter a value" name="deposit"><button type="submit">Deposit</button>';
  document.getElementById('myForm').innerHTML=text;
}

    </script>
    <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['withdraw'])){
    
      $withdraw=$_POST['withdraw'];
      if($withdraw<=$unbidded_shells && $withdraw>=0){
        $unbidded_shells-=$withdraw;
        $total_shells-=$withdraw;
        $query="UPDATE `user_details` SET unbidded_shells=$unbidded_shells,total_shells=$total_shells WHERE username='$profile_username'";
        $conn->query($query);
        $done = true;
      }
      else{
        $error=true;
      }
      
    }
    if(isset($_POST['deposit'])){
      $deposit=$_POST['deposit'];
      $unbidded_shells+=$deposit;
        $total_shells+=$deposit;
      $query="UPDATE `user_details` SET unbidded_shells=$unbidded_shells,total_shells=$total_shells WHERE username='$profile_username'";
        $conn->query($query);
      $done=true;

    }
    // header("location: profile_2.php");
  }
  if ($done) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully done</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}
if ($error) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Unsuccessful! Enter a valid value.</strong> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div> ';
}
?>
 <script src="https://kit.fontawesome.com/4a8a1a882e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>