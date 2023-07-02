<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AUA";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    

    $query = "INSERT INTO user_details ( name,username, password, phone, email, address, total_shells, bidded_shells, unbidded_shells) VALUES 
    ('$name','$username', '$password', '$phone', '$email', '$address', 0, 0, 0)";

    if ($conn->query($query) === TRUE) {
        ;
    } else {
        echo "Error: " . $conn->error;
    }
    $create_table_query = "CREATE TABLE $username(
        sno bigint AUTO_INCREMENT PRIMARY KEY,
        product_id varchar(50),
        product_name varchar(50),
        sell_buy varchar(10),
        to_person varchar(50) DEFAULT '0',
        is_sold varchar(5),
        image_ext varchar(10),
        product_description varchar(255),
        base_price bigint,
        post_time datetime,
        to_person_phone bigint
    )";
    $conn->query($create_table_query);
    session_start();
    $_SESSION['username']=$username;
    header("location: index.php");
}

// function check_username($conn, $ch) {
//     $username_query = "SELECT COUNT(*) AS count FROM user_details WHERE username='$ch'";
//     $result = $conn->query($username_query);
//     if ($result && $result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $count = $row['count'];

//         if ($count > 0) {
//             // Username exists in the table
//             return "Username already exists.";
//         } else {
//             // Username does not exist
//             return "";
//         }
//     } else {
//         // Error executing the query
//         return "Error: " . $conn->error;
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">

    <!-- <link rel="stylesheet" href="signup.css"> -->
    <link rel="stylesheet" href="signup.css?v=<?php echo time(); ?>">
    <style>
        body {
            background-image: url('projectimages/signin_background.png');
            background-size: cover;
        }
    </style>
</head>

<body>
    <!--navbar-->
    <h1 class="header">SIGN UP</h1>
    <div class="containerr"> 
        <form id="signup-form" action="" method="POST">
            <div class="row">
                <div class="column">
                    <label for="name">Name*</label><br>
                    <input type="text" id="name" name="name" placeholder="Name"
                        onChange="remove_error('name_error')"><br>
                    <p id="name_error" class="error"></p>
                </div>
            </div>
            <div class="one"></div>
            <div class="row">
                <div class="column">
                    <h2 style="font-weight:normal;">ACCOUNT DETAILS</h2>
                    <label for="username">Username*</label><br>
                    <input type="text" id="username" name="username" placeholder="Username"
                        onChange="checkUsername(this.value); remove_error('username_error');"><br>
                    <p id="username_error" class="error"></p>

                    <label for="password">Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Password"
                            onChange='remove_error("password_error");' oninput="countCharacters_password();">
                        <p id="password_tick"></p>
                    </div>
                    <!--<p id="characterCount_password" style="text-align: center;color:grey">0</p>-->
                    <p id="password_error" class="error"></p>

                    <label for="confirm_password">Confirm Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Confirm Password" onChange="remove_error('confirm_password_error')">
                        <p id="confirm_password_tick"></p>
                    </div>
                    <p id="confirm_password_error" class="error"></p>
                </div>
            </div>
            <div class="one"></div>
            <div class="row">
                <div class="column">
                    <h2 style="font-weight:normal;">CONTACT</h2>
                    <label for="phone">Phone*</label><br>
                    <input type="number" id="phone" name="phone" placeholder="Phone"
                        onChange="remove_error('phone_error')"><br>
                    <p id="phone_error" class="error"></p>
                    <label for="email">Email*</label><br>
                    <input type="text" id="email" name="email" placeholder="Email"
                        onChange="remove_error('email_error')">
                    <p id="email_error" class="error"></p>
                    <label for="address">Address*</label><br>
                    <textarea type="text" id="address" name="address" placeholder="Address" oninput="countCharacters();"
                        onChange="remove_error('address_error');"></textarea>
                    <p id="characterCount" style="text-align: center;">0/255</p>
                    <p id="address_error" class="error"></p>
                </div>
            </div>
            <div>
                <input id="submit" type="button" name="submit" form="signup-form" value="Sign Up"
                    onclick="submitForm()">
            </div>

        </form>
        <a href='signin.php' style="margin-top:20px;">Already have an account? Sign In</a>
    </div>
    <footer class="bg-light text-center text-lg-start"style="bottom:0px; width:100vw; margin-top:30px;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); height:5vh;color:brown;padding-top:10px;padding-left:45vw;" >
    AUA- AUA Unlimited Auction
  </div>
  <!-- Copyright -->
</footer>
    
    <script src="signup_2.js"></script>
    <script src="https://kit.fontawesome.com/7f2dc18ea9.js" crossorigin="anonymous"></script>
    <!--footer  -->
</body>

</html>

<script>
    function checkUsername(username) {
        const errorContainer = document.getElementById('username_error');
        errorContainer.textContent = '';

        if (username.trim() !== '') {
            fetch('check_username.php', {
                method: 'POST',
                body: new URLSearchParams({ username })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.error || data.exists || username.includes('@')) {
                        errorContainer.textContent = data.error || 'Invalid username.';
                        document.getElementById('submit').type = 'button'; // Disable the button
                    } else {
                        errorContainer.textContent = '';
                        document.getElementById('submit').type = 'submit'; // Enable the button
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        } else {
            document.getElementById('submit').type = 'button'; // Disable the button if username is empty
        }
    }

</script>
