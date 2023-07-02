<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>AUA</title>
  <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

</head>

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
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bid_page_3.php">Bid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sell_page_4.php">Sell</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile_2.php" title="<?php echo "Hello ".$_SESSION['username']; ?>"><i class="fa-solid fa-user" style="color: #99c1f1;font-size:30px;"></i></a>
        </li>
        

      </ul>
    </div>
  </nav>


  <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner" >
      <div class="carousel-item active">
        <img src="projectimages/image10.png" alt="Our logo" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="projectimages/image9.png" alt="Auction" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="projectimages/image7.png" alt="Biding" width="1100" height="500">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
  <section class="my-5">
    <div class="py-5">
      <h2 class="text-center"> About Us</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <img src="projectimages/logo-white.png" class="img-fluid aboutimg">
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <h2 class="display-5">Unleash the thrill</h2>
          <p class="py-3">Welcome to AUA Unlimited Auction, the ultimate online auction platform where you can experience the thrill of bidding on unique and extraordinary items. Our website offers a wide variety of one-of-a-kind objects that will captivate your imagination and create an unforgettable bidding experience. Whether you're a collector, an enthusiast, or simply looking for something special, AUA Unlimited Auction is the place to be. With a user-friendly interface and a dynamic bidding system, you can participate in auctions from the comfort of your own home, competing against thousands of bidders across the country. Get ready to embark on a thrilling journey where the price tags rise, and the excitement never ends. Join us today and let the bidding begin!</p>
          <a href="about.php" class="btn btn-success"> Check more</a>
        </div>
      </div>
    </div>
  </section>

  <section class="my-5">
    <div class="py-5">
      <h2 class="text-center"> Our services</h2>
    </div>
    <div class="container-fluid">
      <div class="row">
      <div class="col-lg-1 col-md-1 col-0 buysell">
     </div>
        <div class="col-lg-4 col-md-4 col-6 buysell">
          <div class="card buysell">
            <img class="card-img-top imaag" src="projectimages/Bid.jpg" alt="Card image" >
            <div class="card-body">
              <h4 class="card-title">BID</h4>
              <p class="card-text"> Outbid the rest. Claim your treasure. </p>
              <a href="bid_page_3.php" class="btn btn-primary">Bid Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 col-0 buysell">
     </div>
        <div class="col-lg-4 col-md-4 col-6 buysell">
          <div class="card buysell">
            <img class="card-img-top imaag" src="projectimages/Sell.jpg" alt="Card image" >
            <div class="card-body">
              <h4 class="card-title">SELL</h4>
              <p class="card-text">Unlock the value. Sell with AUA Unlimited Auction.</p>
              <a href="sell_page_4.php" class="btn btn-primary">Sell Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1 col-0 buysell">
     </div>

      </div>
    </div>

  </section>
  <section class="my-5">
    <div class="py-5">
      <h2 class="text-center"> Gallery</h2>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/cup.png" alt="image" class="image-fluid py-4" style="height:40vh;">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/idol.png" alt="image" class="image-fluid py-4" style="height: 40vh;width:100%">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/painting.png" alt="image" class="image-fluid py-4" style="height: 40vh;width:95%;">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/wall_decor.png" alt="image" class="image-fluid pb-4" style="height: 40vh;">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/shoes_and_purse.png" alt="image" class="image-fluid pb-4" style="height: 40vh;">
          </div>
          <div class="col-lg-4 col-md-4 col-12">
            <img src="projectimages/rolex.png" alt="image" class="image-fluid pb-4" style="height: 40vh;">
          </div>

        </div>
      </div>
  </section>
 <!-- Footer -->
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
            <a href="about.php" class="text-reset">About AUA</a>
          </p>
          <p>
            <a href="index.php" class="text-reset">Home</a>
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
<!-- Footer -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script
      src="https://kit.fontawesome.com/4a8a1a882e.js"
      crossorigin="anonymous"
    ></script>
</body>

</html>