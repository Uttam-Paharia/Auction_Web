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
        $create_table_query="CREATE TABLE $username(
            sno bigint AUTO_INCREMENT PRIMARY KEY,
            product_id varchar(50),
            product_name varchar(50),
            sell_buy varchar(10),
            to_person varchar(50),
            is_sold varchar(5),
            product_image varbinary(255),
            product_description varchar(255),
            base_price bigint,
            current_price bigint
        )";
        $conn->query($create_table_query);
    }

    function check_username($conn, $ch) {
        $username_query = "SELECT COUNT(*) AS count FROM user_details WHERE username='$ch'";
        $result = $conn->query($username_query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $count = $row['count'];
    
            if ($count > 0) {
                // Username exists in the table
                echo "Username already exists.";
                $submit_button_type = "button";
            } else {
                // Username does not exist
                $submit_button_type = "submit";
            }
        } else {
            // Error executing the query
            echo "Error: " . $conn->error;
            $submit_button_type = "submit";
        }
        return $submit_button_type;
    }
    
?>

<html>
<head>
    <!--favicon-->
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
    <!--navbar-->
    <h1 class="header">SIGN UP</h1>
    <div class="container">
        <form id="signup-form" action="" method="POST">
            <div class="row">
                <div class="column">
                    <label for="name">Name*</label><br>
                    <input type="text" id="name" name="name" placeholder="Name" onChange="remove_error('name_error')"><br>
                    <p id="name_error" class="error"></p>
                </div>
            </div>
            <div class="one"></div>
            <div class="row">
                <div class="column">
                    <h2 style="font-weight:normal;">ACCOUNT DETAILS</h2>
                    <label for="username">Username*</label><br>
                    <input type="text" id="username" name="username" placeholder="Username" onChange="getElementById('submit').type=<?php echo isset($_POST['username']) ? check_username($conn,$_POST['username']) : 'submit'; ?>;remove_error('username_error');check_username($conn,this.value);" oninput="getElementById('submit').type=<?php echo isset($_POST['username']) ? check_username($conn,$_POST['username']) : 'submit'; ?>"><br>
                    <p id="username_error" class="error"></p>

                    <label for="password">Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Password" onChange='remove_error("password_error");' oninput="countCharacters_password();">
                        <p id="password_tick"></p>
                    </div>
                    <!--<p id="characterCount_password" style="text-align: center;color:grey">0</p>-->
                    <p id="password_error" class="error"></p>

                    <label for="confirm_password">Confirm Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onChange="remove_error('confirm_password_error')">
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
                    <input type="number" id="phone" name="phone" placeholder="Phone" onChange="remove_error('phone_error')"><br>
                    <p id="phone_error" class="error"></p>
                    <label for="email">Email*</label><br>
                    <input type="text" id="email" name="email" placeholder="Email" onChange="remove_error('email_error')">
                    <p id="email_error" class="error"></p>
                    <label for="address">Address*</label><br>
                    <textarea type="text" id="address" name="address" placeholder="Address" oninput="countCharacters();" onChange="remove_error('address_error');"></textarea>
                    <p id="characterCount" style="text-align: center;">0/255</p>
                    <p id="address_error" class="error"></p>
                </div>
            </div>
            <div>
                <input id="submit" type="submit" name="submit" form="signup-form" value="Sign Up">
            </div>
        </form>
    </div>
    <!-- <script src="signup.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/7f2dc18ea9.js" crossorigin="anonymous"></script>  -->
    <!--footer  -->
</body>
</html>
<?php
    $conn->close();
?>