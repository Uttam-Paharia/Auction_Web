<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AUA";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username;
$password;
$checkpass;
$count;
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query="SELECT count(username) as count FROM `user_details` WHERE username='$username'";
    $conn->query($query);
    $result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    // OUTPUT DATA OF THE ROW
    $row = $result->fetch_assoc();

    // Print the values of total_shells, bided_shells, and unbided_shells
   $count=$row['count'];

} else {
    echo "No data found.";
}
if($count==0)
{
    $showError = "Invalid Credentials";
    // echo "<script>"+
    // "document.getElementById('error').innerHTML='Incorrect Information';"+
    // "</script>";



}
else
{
    $query="SELECT password FROM user_details WHERE username='$username'";
    $conn->query($query);
    $result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    // OUTPUT DATA OF THE ROW
    $row = $result->fetch_assoc();

    // Print the values of total_shells, bided_shells, and unbided_shells
   $checkpass=$row['password'];

} else {
    echo "No data found.";
}
if($checkpass==$password)
{
    // echo "<script>"+"let a=document.createElement('a');"+
    // "let link=document.createTextNode('Ready To Go');"+
    // "a.appendChild(link);"+
    // "a.href='index.html';"+
    // "document.body.appendChild(a)"+"</script>";
    $login = true;
    session_start();
    $_SESSION['username']=$username;
    header("location: index.php");

}
else
{
    // echo "<script>"+
    // "document.getElementById('error').innerHTML='Invalid Credentials';"+
    // "</script>";
    $showError = "Invalid Credentials";
}

}

}


$conn->close();
?>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">

    <!-- <link rel="stylesheet" href="signup.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
    <style>
        body {
            background-image: url('projectimages/signin_background.png');
            background-size: cover;
        }
        #button{
            width:100px;
            border-radius:10px;
            background-color: #FFF0F5;
            color:green;
            font-weight:bold;
            height:50px;
        }
        #button:hover{
    background-color: #E6E6FA;
    color:black;
}
    </style>

</head>

<body>
    <!--navbar-->
    <h1 class="header" style="margin-top:20vh;">SIGN IN</h1>
    <div class="containerr">
        <form id="signin-form" action="signin.php" method="POST">
            <div class="row" style="margin-left:3px;">
                <div class="column">
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="username"><br>
                </div>
            </div>

            <label for="password">Password</label><br>
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Password"
                    onChange='remove_error("error");'>
            </div>
            <!--<p id="characterCount_password" style="text-align: center;color:grey">0</p>-->
            <p id="error" class="error"></p>
            <div>
                <button id="button" type="submit" name="submit" form="signin-form" value="Sign In" >Sign In</button>
            </div>

        </form>
        <div style="margin-top:20px;"> <a href="signup_7.php">New to our Website? SignUp now!</a></div>
    </div>
    <footer class="bg-light text-center text-lg-start"style="position:absolute; bottom:0px; width:100vw;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);" >
    © 2020 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
    <script>

        function remove_error(id) {
            if (document.getElementById(id).innerHTML == "This field is required.") {
                document.getElementById(id).innerHTML = "";
            }
            return;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>