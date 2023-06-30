<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="AUA";
    
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    session_start();
    $_SESSION['username'];
    class product { 
        public $product_id;
        public $product_name;
        public $auction_duration;
        public $bid_time_increase;
        public $base_price;
        public $current_price;
        public $image_ext;
    
        function __construct($id, $name, $dura, $incr, $price, $curr, $ext) {
            $this->product_id = $id;
            $this->product_name = $name;
            $this->auction_duration = $dura;
            $this->bid_time_increase = $incr;
            $this->base_price = $price;
            $this->current_price = $curr;
            $this->image_ext = $ext;
        }
    }
    $num_row=0;
    $query="SELECT * FROM `objects` limit 30";
    $result = $conn->query($query);
    $no_rows=$result->num_rows;
    
    $arr= [];
    $to_person;
    for($i=0;$i<$no_rows;$i++) 
    {
        $row = $result->fetch_assoc();
        $auction_duration=$row['auction_duration'];
        
        $post_time=$row['post_time'];
        $product_id=$row['product_id'];
        $postDateTime = new DateTime($post_time);
        $seller=substr($product_id,0,strpos($product_id,'@'));
        $query="SELECT to_person FROM `$seller` WHERE product_id = '$product_id'";
        $results=$conn->query($query);
        if($results->num_rows>0)
        {
            $rows = $results->fetch_assoc();
            $to_person=$rows['to_person'];
            var_dump($to_person);
            
        }
        var_dump($seller);
        var_dump($product_id);


        // Split auction duration into hours, minutes, and seconds
        list($hours, $minutes, $seconds) = explode(':', $auction_duration);

        // Create a DateInterval object based on auction duration
        $durationInterval = new DateInterval("PT{$hours}H{$minutes}M{$seconds}S");

        // Calculate the auction end time
        $endTime = $postDateTime->add($durationInterval);

        // Get the current time
        $currentTime = new DateTime();

        // Calculate the time left for the auction
        if ($currentTime >= $endTime) {
            if($to_person!=0)
{
    $bidded_shells_person;
    $total_shells_person;
    $phone_person;
    $query="SELECT bidded_shells,total_shells,phone FROM `user_details` WHERE username='$to_person'";//GIVE TO PERSON
    $result = $conn->query($query);

if ($results === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($results->num_rows > 0) {
    $row1 = $results->fetch_assoc();
    $bidded_shells_person=$row1['bidded_shells'];
    $total_shells_person=$row1['total_shells'];
    $phone_person=$row1['phone'];
}
$current_price;
$product_name;
$ext;
$query="SELECT current_price ,product_name,image_ext FROM `objects` WHERE product_id='$product_id'";//GIVE PRODUCTID
$result = $conn->query($query);
if ($results === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($results->num_rows > 0) {
  $row2 = $results->fetch_assoc();
    $current_price=$row2['current_price'];
    $product_name=$row2['$product_name'];
    $ext=$row2['image_ext'];
}
$unbidded_shells_seller;
$total_shells_seller;
$phone_seller;
$query="SELECT unbidded_shells,total_shells,phone FROM `user_details` WHERE username='$seller'";//GIVE $seller
$result = $conn->query($query);

if ($results === false) {
die("Error retrieving data: " . $conn->error);
}

if ($results->num_rows > 0) {
$row3 = $results->fetch_assoc();
$unbidded_shells_seller=$row3['unbidded_shells'];
$total_shells_seller=$row3['total_shells'];
$phone_seller=$row3['phone'];
}
$bidded_shells_person-=$current_price;
$total_shells_person-=$current_price;
$unbidded_shells_seller+=(int)0.99*$current_price;
$total_shells_seller+=(int)0.99*$current_price;//1% with us:)


////updated------
$query="UPDATE `user_details` SET bidded_shells=$bidded_shells_person,total_shells=$total_shells_person WHERE username='$to_person'";//to_person
$conn->query($query);
$query="UPDATE `user_details` SET unbidded_shells=$unbidded_shells_seller,total_shells=$total_shells_seller WHERE username='$seller'";//seller
$conn->query($query);
$query="UPDATE `$seller` SET is_sold='YES',to_person_phone=$phone_person WHERE product_id=$product_id";//seller productid
$conn->query($query);


$query="INSERT INTO `to_person`(product_id,product_name,sell_buy,to_person,image_ext) VALUES('$product_id','$product_name','BUY','$seller','$ext')";
$conn->query($query);

$query="DELETE FROM `objects` WHERE product_id='$product_id'";
$conn->query($query);

}
$query="DELETE FROM `objects` WHERE product_id='$product_id'";
$conn->query($query);

            $i--;
            
        }
        else{

            $num_row++;
            $pr=new product($row['product_id'],$row['product_name'],$row['auction_duration'],$row['bid_time_increase'],$row['base_price'],$row['current_price'],$row['image_ext']);
            $arr[]=$pr;
        }
    }
    

    $text="";
    for($i=0;$i<$num_row;$i++){
        $text.="<a href='"."product_page.php?product_id=".($arr[$i]->product_id)."'>".
        "<div class='product' title='Click to Bid'>".
        "<img  class='image' id='image' src='uploads/".($arr[$i]->product_id).".".($arr[$i]->image_ext)."'>".
        "<div class='base_price'><p>Bid:<del id='base_price'>".($arr[$i]->base_price)."</del></p></div>".
        "<p id='current_bid'>".($arr[$i]->current_price)."</p>".
        "<p>Product Name: <span id='product_name'>".($arr[$i]->product_name)."</span></p>".
        "</div></a>";
    }

    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bid_page.css">
    <title>Bid</title>
  <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="projectimages/logo-white.png"><img src="projectimages/logo-white.png" width="50" height="50" alt="logo_image"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link" href="bid_page_3.php">Bid  <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="sell_page_4.php">Sell</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="profile_2.php" title="<?php echo "Hello ".$_SESSION['username']; ?>"><i class="fa-solid fa-user" style="color: #99c1f1;font-size:30px;"></i></a>                </li>
            </ul>
           
    </div>
  </nav>
    <div class="top">
        <img src="projectimages/bid_image_top_3.png" alt="Shopping Image" id="image_top" >
        <div class="dot">
            <p class="bid_on">Bid On</p>
            <p class="bid_on">New Arrivals</p>
        </div>
    </div>
    <div class="grid" id="grid">
        <?php
            
            // $print="<script>".
            // "document.getElementById('grid').innerHTML=".$text
            // ."</script>";
            echo $text;
        ?>
        <!-- <a href="">
            <div class="product" title="Click to Bid">
                <img  class='image' id='image' src="projectimages/auction2.jpeg">
                <div class="base_price"><p>Bid:<del id="base_price">45555</del></p></div>
                <p id="current_bid">450000</p>
                <p>Product Name: <span id="product_name">Chair</span></p>
            </div>
        </a> -->
      
    </div>
    <footer class="text-center text-lg-start bg-dark text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fab fa-facebook-f" style="color: white"></i>
      </a>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fab fa-twitter" style="color: white"></i>
      </a>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fab fa-google" style="color: white"></i>
      </a>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fa-brands fa-instagram" style="color: white"></i>
      </a>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fab fa-linkedin" style="color: white"></i>
      </a>
      <a href="https://youtu.be/xvFZjo5PgG0" class="me-4 link-secondary">
        <i class="fab fa-github" style="color: white"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>AUA Ltd
          </h6>
          <p>
            Footers are so formal, not our style at all. Go explore our site, have fun!
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">DISCOVER</h6>
          <p>
            <a href="#!" class="text-reset">About AUA</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Home</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Privacy Policy</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Support</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">OTHER</h6>
          <p>
            <a href="#!" class="text-reset">Terms of Service</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">CONTACT</h6>
          <p>
            <i class="fas fa-home me-3 text-secondary"></i> Room 105, Raman, IITH
          </p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            AUALtd@AUAmail.com
          </p>
          <p>
            <i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88
          </p>
          <p>
            <i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89
          </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025)">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="https://AUAunlimitedAuction.com/">AUAunlimitedAuction.com</a>
  </div>
  <!-- Copyright -->
</footer>
<script
      src="https://kit.fontawesome.com/4a8a1a882e.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>