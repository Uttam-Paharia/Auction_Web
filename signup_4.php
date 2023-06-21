<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="AUA";
    $conn=new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: "
            . $conn->connect_error);
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
        <div class="row">
            <div class="column">
                <form id="signup-form" action="" method=_GET">
                    <label for="name">Name*</label><br>
                    <input type="text" id="name" name="name" placeholder="Name" onChange="remove_error('name_error')"><br>
                    <p id="name_error" class="error" ></p>
                </form>
            </div>
        </div>
        <div class="one"></div>
        <div class="row">
            <div class="column">
                <h2 style="font-weight:normal;">ACCOUNT DETAILS</h2>
                <form id="signup-form2" action="" method=_GET">
                    <label for="username">Username*</label><br>
                    <input type="text" id="username" name="username" placeholder="Username" onChange="remove_error('username_error')"><br>
                    <p id="username_error" class="error" ></p>

                    <label for="password">Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Password" onChange='remove_error("password_error");' oninput="countCharacters_password();">
                        <p id="password_tick" ></p>
                    </div>
                    <!--<p id="characterCount_password" style="text-align: center;color:grey">0</p>-->
                    <p id="password_error" class="error"></p>

                    <label for="confirm_password">Confirm Password*</label><br>
                    <div class="password-container">
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" onChange="remove_error('confirm_password_error')">
                        <p id="confirm_password_tick"></p>
                    </div>
                    <p id="confirm_password_error" class="error"></p>
                </form>
            </div>
        </div>
        <div class="one"></div>
        <div class="row">
            <div class="column">
                <h2 style="font-weight:normal;">CONTACT</h2>
                <form id="signup-form3" action="" method=_GET">
                    <label for="phone">Phone*</label><br>
                    <input type="number" id="phone" name="phone" placeholder="Phone" onChange="remove_error('phone_error')"><br>
                    <p id="phone_error" class="error"></p>
                    <label for="email">Email*</label><br>
                    <input type="text" id="email" name="email" placeholder="Email" onChange="remove_error('email_error')">
                    <p id="email_error" class="error"></p>
                    <label for="address">Address*</label><br>
                    <textarea type="text" id="address" name="address" placeholder="Address" oninput="countCharacters();" onChange="remove_error('address_error');">
                    </textarea>
                    <p id="characterCount" style="text-align: center;">0/255</p>
                    <p id="address_error" class="error"></p>
                </form>
            </div>
        </div>
        <div>
            <input id="submit" type="submit" name="submit" form="signup-form" value="Sign Up">
        </div>
    </div>
    <!-- <script src="signup.js"></script> -->


    
    <!-- <script src="https://kit.fontawesome.com/7f2dc18ea9.js" crossorigin="anonymous"></script>  -->


    <!--footer  -->
</body>
</html>

    <?php
        //var_dump($_GET);
        // if(isset($_GET['submit'])){
            $name=$_GET['name']; $username=$_GET['username']; $password=$_GET['password']; $phone=$_GET['phone']; $email=$_GET['email']; $address=$_GET['address'];
            echo $name;

            // $query= "INSERT INTO user_details (username,password,phone,email,address,total_shells,bidded_shells, unbidded_shells) VALUES ('$username','$password', '$phone','$email','$address',0,0,0)";
            // $data=mysqli_query($conn,$query);
            // if (!$data) {
            //     echo "Error: " . mysqli_error($conn);
            // }
            // else{
            //     echo "DATA NOT INSERTED";
            // }


            $sqlquery = "INSERT INTO table VALUES
    (DEFAULT, '$username', '$password','$phone','$email','$address',0,0,0)"
 
if ($conn->query($sqlquery) === TRUE) {
    echo "record inserted successfully";
} else {
    echo "Error: " . $sqlquery . "<br>" . $conn->error;
}
            
        // }
    ?> 
