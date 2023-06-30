<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    $servername="localhost";
    $password="";
    $dbname="AUA";
    
    $conn=mysqli_connect($servername,"root",$password,$dbname);
    session_start();
    $username=$_SESSION['username'];
    class product { 
        public $product_id;
        public $product_name;
        public $to_person;
        public $sell_buy;
        public $is_sold;
        public $to_person_phone;
        public $image_ext;
    
    function __construct($id, $name, $to, $sell, $sold, $phone, $ext) {
            $this->product_id = $id;
            $this->product_name = $name;
            $this->to_person = $to;
            $this->sell_buy = $sell;
            $this->is_sold = $sold;
            $this->to_person_phone = $phone;
            $this->image_ext = $ext;
        }
    }
    $query="SELECT * FROM `$username`";
    $result=$conn->query($query);
    $no_rows=$result->num_rows;
    $arr= [];
    for($i=0; $i<$no_rows;$i++){
        $row = $result->fetch_assoc();

        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $sell_buy=$row['sell_buy'];
        $phone=$row['to_person_phone'];
        $is_sold = $row['is_sold'];
        $image_ext=$row['image_ext'];
        $to_person=$row['to_person'];
        $pr=new product($product_id,$product_name,$to_person,$sell_buy,$is_sold,$phone,$image_ext);
        $arr[]=$pr;
    }

    $text="";
    for($i=0;$i<$no_rows;$i++){
        if($sell_buy=='SELL' && $is_sold=="YES"){
            $text.='<div class="product"><img class="product_image" src="uploads/'.($arr[$i]->product_id).'.'.$image_ext.">".'<p class="name">'.($arr[$i]->product_name)."</p><p class='to_person'> Bought from ".$to_person."</p><p class='contact'> Contact: <span>".($arr[$i]->to_person_phone)."</span></p></div>";
        }
        else if($sell_buy='SELL'){
            $text.="<div class='product'>".
            "<img  class ='product_image' src='uploads/".($arr[$i]->product_id).".".($arr[$i]->image_ext)."'>".
            "<p class='to_person'>Unsold</p>
        </div>";
        }
        else{
            $text.="<div class='product'>".
                    "<img  class ='product_image' src='uploads/".($arr[$i]->product_id).".".($arr[$i]->image_ext)."'>".
                    "<p class ='name'>"($arr[$i]->product_name)."</p>".
                    "<p class='to_person'>Sold to ".($arr[$i]->to_person)."</p>".
                    "<p class='contact'>Contact: <span>".($arr[$i]->to_person_phone)."</span></p>".
                "</div>";
        }
    }

    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css?v=<?php echo time(); ?>" />
  <script src="https://kit.fontawesome.com/4a8a1a882e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="history.css" rel="stylesheet">
    <title>History</title>
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
    <div class ='top'>
        <div>
            <img  class="cutie"src="projectimages/qmt.jpg">
        </div>
        <div class="right">
            <h1 class ='header'>Hey! Check out your bid-sell journey</h1>
            <div class="containerr">
                <?php
                    echo $text;
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script
      src="https://kit.fontawesome.com/4a8a1a882e.js"
      crossorigin="anonymous"
    ></script>
</body>
</html>



 