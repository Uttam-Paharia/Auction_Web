<!DOCTYPE html>
<html lang="en">

<head>
  <title>AUA</title>
  <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="CSS/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/4a8a1a882e.js" crossorigin="anonymous"></script>
  <script src="three.r134.min.js"></script>

  <script src="vanta.net.min.js"></script>
</head>

<body id="hi" style="height: 100vh">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="projectimages/logo-white.png"><img src="projectimages/logo-white.png" width="50"
        height="50" alt="logo_image" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="about.html">About<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bid_page_3.php">Bid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sell_page_4.php">Sell</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="profile_2.php" title="<?php echo "Hello ".$_SESSION['username']; ?>"><i class="fa-solid fa-user" style="color: #99c1f1;font-size:30px;"></i></a>        </li>

      </ul>

    </div>
  </nav>
  <div class="jumbotron" style="text-align: center">

    <img src="projectimages/nature.png" alt="image" style="height: 55vh; width: 90vw;">
  </div>
  
  <section class="my-5">
    <div class="py-5">
      <h2 class="text-center">About Us</h2>
    </div>
    <div class="container-fluid" style="margin-bottom:10vh;">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
          <img src="projectimages/logo-white.png" class="img-fluid aboutimg" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <h3 class="display-4">Auction </h3>
          <p class="py-3">
            Hi!! Welcome to AUA Unlimited Auction, a place born in the minds of three naive, young teens who just wanted
            to do something big. In a world dominated by the monotony of e-commerce websites, it’s not a bad idea to add
            a little bit of spice here and there, is it?<br>
            Auctions are huge in today’s world, all the way from antique auctions to the IPL auctions. To watch that
            price tag go up, to see those placards rise, the feeling cannot be captured in words. But who’s to say you
            can’t experience it on your own? Create an account with us today and open yourself to a world filled with
            one-of-a-kind objects, all being bid at by thousands of people across the world. It’s just you and your
            shells (Yes, what’s what we’re calling our money) in a race against time. Happy bidding!!<br>

          </p>
        </div>
      </div>
      <section class="my-5">
        <div class="py-5">
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/antique1.png" alt="Card image">

              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/jwel.png" alt="Card image">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/ring1.png" alt="Card image">
              </div>
            </div>

          </div>
        </div>

      </section>
      <h2 style="margin-top: 10vh;">Instructions</h2>
      <p>To set yourself up, exchange your money with on-platform shells. These shells determine whether or not you will
        be allowed to bid on a specific item. Simply put, if the asking price is greater than the number of shells you
        have not bid yet, you won’t be allowed to bid.<br>
        Bidding rules: Typical rules apply, an object starts off at the base price and the numbers shoot up based on the
        bid. Every object will stay on auction for a period decided by user, but with every new bid, the duration of
        stay goes up by a fixed amount .</p>
      <section class="my-5">
        <div class="py-5">
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/antique2.png" alt="Card image">

              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/bag.png" alt="Card image">
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 buysell">
              <div class="card buysell">
                <img class="card-img-top imaag" src="projectimages/image2.png" alt="Card image">
              </div>
            </div>

          </div>
        </div>
        <h2 style="margin-top: 10vh;">SHELLS</h2>
        <div class="row" style="background-color: lightgrey; margin-top:3vh;">
          <div class="col-lg-6 col-md-6 col-12" style="text-align: center;">
            <img src="projectimages/seashell.png" style="width:30vw;height:40vh" />
          </div>
          <div class="col-lg-6 col-md-6 col-12"style="margin-top:30px;">
            <p>
              Looking at the same old boring notes gets a little dull, huh? We thought so too, which is why we decided
              to make our own, super fancy, absolutely incredible form of currency. Cut to, drum roll please...
              <em>Shells.</em><br><br>
              The concept is simple. You give us money, we give you shells. You then use these shells to conduct any
              dealings on the site. Think of it as our version of credits. At any given time, you'll have a certain
              amount of bid shells and unbid shells. The unbid shells are what you use to place any future bids and a
              bid can only be placed if the number of unbid shells you have is more than the asking price of a given
              object. Similarly, you sell an object for a specific price, we give you those many shells.<br><br>
              (Oh also, we take 1% of whatever price you sell an object at. Our brokering fee.)
            </p>
          </div>
        </div>

    </div>
  </section>
  <section id="venta" style="height: 70vh; width: 80vw; margin:auto; margin-top: 20px margin-bottom:10vh;"></section>
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-muted " style="margin-top:10vh;">
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
  <!-- Footer -->

  <script>
    VANTA.NET({
      el: "#venta",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.0,
      minWidth: 200.0,
      scale: 1.0,
      scaleMobile: 1.0,
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>