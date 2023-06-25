<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "AUA";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $count=0;
    $correct = 0;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // var_dump($conn);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $name = $_POST['name'];
        $description = $_POST['description'];
        $auctionTime = $_POST['auctionTime'];
        $bidTime = $_POST['bidTime'];
        $basePrice = intval($_POST['basePrice']);
        $username='blah';     //set this

        $targetDir = "uploads/"; // Directory where the uploaded images will be stored
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedTypes)) {
          exit;
        }
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        // var_dump($name, $description, $auctionTime, $bidTime, $basePrice,  $targetFile);

        $query = "INSERT INTO $username (product_name,sell_buy,is_sold,product_image,product_description,base_price) VALUES 
        ('$name','SELL', 'NO', '$targetFile', '$description', '$basePrice')";
        // var_dump($query);
    
        if ($conn->query($query) === TRUE) {
            $count++;
        } else {
            echo "Error: " . $conn->error;
        }
        $query2 = "SELECT sno FROM $username WHERE
        product_name='$name' AND sell_buy='SELL' AND is_sold='NO' AND product_description='$description' AND base_price='$basePrice'";
        
      // FETCHING DATA FROM DATABASE
      // var_dump($query2);
      $result = $conn->query($query2);

      if ($result === false) {
          die("Error retrieving data: " . $conn->error);
      }
        $sno=0;
      if ($result->num_rows > 0) {
          // OUTPUT DATA OF THE ROW
          $row = $result->fetch_assoc();
  
          // Print the values of total_shells, bided_shells, and unbided_shells
          $sno = $row['sno'];
          $count++;
        
      } else {
          echo "No data found.";
      }
        
      

        $set_product_id_query="UPDATE $username SET product_id=CONCAT('$username','@','$sno') WHERE
        product_name='$name' AND sell_buy='SELL' AND is_sold='NO' AND product_description='$description' AND base_price='$basePrice'";
        // var_dump($set_product_id_query);
        if ($conn->query($set_product_id_query) === TRUE) {
          $count++;
      } else {
          echo "Error: " . $conn->error;
      }

        $time=date('H:i:s', strtotime("+" . $auctionTime . " hours"));

        $objects_table_query = "INSERT INTO objects (product_id,product_name,post_time,auction_duration,bid_time_increase,product_image,base_price) VALUES (CONCAT('$username','@','$sno'),'$name',CURRENT_TIMESTAMP(),TIME('" . $time . "'),'$bidTime','$targetFile','$basePrice')";
        $correct = 1;
        // var_dump($objects_table_query);
        if ($conn->query($objects_table_query) === TRUE) {
          $count++;
          $jsCode=<<<EOT
      <script>
      after();
      </script>
      EOT;
      echo $jsCode;
      echo "Hello World";
      } else {
          echo "Error: " . $conn->error;
      }
      
      
    }
    $conn->close();
    
     
    

?>
<html>
<head>
  <title>Post Your Ad</title>
  <link rel="stylesheet" type="text/css" href="sell_page_2.css?v=<?php echo time(); ?>">
  <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="sell_page.css?v=<?php echo time(); ?>">
  <script>
    function countCharacters(input, countElementId, limit) {
      var countElement = document.getElementById(countElementId);
      var count = input.value.length;
      countElement.innerText = count + "/" + limit;

      if (count > limit) {
        countElement.classList.add("error");
      } else {
        countElement.classList.remove("error");
      }
    }

    function validateForm() {
      var image = document.getElementById("image").value;
      var name = document.getElementById("name").value;
      var description = document.getElementById("description").value;
      var auctionTime = document.getElementById("auctionTime").value;
      var bidTime = document.getElementById("bidTime").value;
      var basePrice = document.getElementById("basePrice").value;

      if (image === "") {
        alert("Please select an image.");
        return false;
      }

      if (name === "") {
        alert("Please enter a product name.");
        return false;
      }

      if (name.length > 50) {
        alert("Product name should not exceed 50 characters.");
        return false;
      }

      if (description === "") {
        alert("Please enter a product description.");
        return false;
      }

      if (description.length > 255) {
        alert("Product description should not exceed 255 characters.");
        return false;
      }

      if (auctionTime < 1 || auctionTime > 12) {
        alert("Please enter a valid auction duration (between 1 and 12 hours).");
        return false;
      }

      if (bidTime < 1 || bidTime > 60) {
        alert("Please enter a valid bid time increase (between 1 and 60 minutes).");
        return false;
      }

      if (basePrice < 0) {
        alert("Please enter a valid base price (greater than or equal to 0).");
        return false;
      }

      return true;
    }
  </script>
</head>
<body>
<?php if (isset($_GET['error'])): ?>
  <div class="error-message"><?php echo $_GET['error']; ?></div>
<?php endif; ?>

  <div class="Padding_bottom">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="projectimages/logo-white.png"><img src="projectimages/logo-white.png" width="50" height="50" alt="logo_image"></a>
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
                        <a class="nav-link" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="bid.php">Bid </a>
                    </li>
                    <li class="nav-item active"  >
                        <a class="nav-link" href="sell.php">Sell <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacts.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
      </div>


  <h1>Post Your Ad</h1>
  <div class="Padding_bottom">
  <form  method="POST" enctype="multipart/form-data" onsubmit="return validateForm();" id="form">
    <label for="image">Product Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required><br><br>
    <!-- <label for="files" class="btn">Select Image <i class="fa-solid fa-camera fa-lg"></i></label>
    <input id="files" style="visibility:hidden;" type="file"> -->

    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" oninput="countCharacters(this, 'nameCount', 50)" required>
    <span id="nameCount" class="count"></span><br><br>

    <label for="description">Product Description:</label><br>
    <textarea id="description" name="description" oninput="countCharacters(this, 'descriptionCount', 255)" required></textarea>
    <span id="descriptionCount" class="count"></span><br><br>

    <label for="auctionTime">Auction Duration (in hours( less than or equal to 12 )):</label>
    <input type="number" id="auctionTime" name="auctionTime" min="1" max="12" required><br><br>

    <label for="bidTime">Bid Time Increase (in minutes( less than or equal to 60)):</label>
    <input type="number" id="bidTime" name="bidTime" min="1" max="60" required><br><br>

    <label for="basePrice">Base Price:</label>
    <input type="number" id="basePrice" name="basePrice" min="0" required><br><br>

    <input id = 'submit' type="submit" value="Submit" >
  </form>
 
  </div>


  <div class="container2" id="thanks" style="text-align:center;">
    </div>
  <script src="https://kit.fontawesome.com/7f2dc18ea9.js" crossorigin="anonymous"></script>

  <!--navbar-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function after(){
      event.preventDefault();
      document.getElementById('form').style.opacity="0.3";
      document.getElementById('thanks').innerHTML="<h2 style='margin-top:10%; margin-bottom:3%;font-size:45px;color:green;font-weight:bold;'>Thank You</h2>"+
        "<p style='font-size:25px;color:rgb(23, 198, 233);'>Your AD has been posted</p>"+
        "<a href='index.html' ><button id='button'>Return to Home</button></a>"
        document.getElementById('thanks').style="position:fixed;"+
    "top:25%;"+
    "left:25%;"+
    "border: solid 10px black;"+
    "border-style:inset;"+
    "border-radius:20px;"+
    "background-color:rgb(235, 235, 235);"+
    "height:50vh;"+
    "width:50vw;"+
    /* transform:translate(-50%,-50%); */
    "box-shadow: 5px 5px 20px black;"
    
    }
    
  </script>
  <!-- <script>
    document.querySelector('#submit').addEventListener('click' , function(event){
      console.log('Hello Anshika')
      let str= "<?php echo $correct?>";
      // let len = str.length;
     console.log(str);
      if(str[0] == "1")
      {
        after();
      }
      // event.preventDefault();
    })
    </script> -->
 
</body>
</html>
