<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $databasename = "AUA";
  
  // CREATE CONNECTION
  $conn = new mysqli($servername, $username, $password, $databasename);
  
  // GET CONNECTION ERRORS
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
?>
<html lang="en">

<head>
    <title>AUA</title>
    <link rel="icon" type="image/x-icon" href="projectimages/logo-white.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="profile.css?v=<?php echo time(); ?>" rel="stylesheet">

</head>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="projectimages/logo-white.png"><img src="projectimages/logo-white.png" width="50" height="50" alt="logo_image"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item" active>
                    <a class="nav-link" href="bid.html">Bid  <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="sell.html">Sell</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts.html">Contacts</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
<div class="containerr">
    <div class="one flex_item">
    <span class="dot" id="name_initial"></span>
    </div>
    <div class="two flex_item">
        <p  id="username_display"></p>
        <script>
              let username='blah';
              document.getElementById('username_display').innerHTML="<span style='font-weight:bold;'>USERNAME:</span> "+username;
              document.getElementById('name_initial').innerHTML=username[0].toUpperCase();
        </script>
        <?php
      // SQL QUERY
      $query = "SELECT total_shells, bidded_shells, unbidded_shells FROM `user_details` WHERE username='blah'";
        
      // FETCHING DATA FROM DATABASE
      $result = $conn->query($query);

      if ($result === false) {
          die("Error retrieving data: " . $conn->error);
      }
        
      if ($result->num_rows > 0) {
          // OUTPUT DATA OF THE ROW
          $row = $result->fetch_assoc();
  
          // Print the values of total_shells, bided_shells, and unbided_shells
          $total_shells = $row['total_shells'];
          $bidded_shells = $row['bidded_shells'];
          $unbidded_shells = $row['unbidded_shells'];
  
          echo "Total shells: " . $total_shells . "<br>";
          echo "Bid shells: " . $bidded_shells . "<br>";
          echo "Unbid shells: " . $unbidded_shells . "<br>";
      } else {
          echo "No data found.";
      }
        
      $conn->close();
    ?>
        
    </div>
    
    <div class="three flex_item">
        <img src="projectimages/withdraw.png" style="width:300px;">
        <a  class="btn btn-success" style="margin:40px"> Click Here To Withdraw</a>
    </div>
    <div class="four flex_item">
        <img src="projectimages/deposit.png" style="width:300px;">
        <a  class="btn btn-success" style="margin:40px" onclick="document.getElementById('paytm').innerHTML='uttampaharia@okaxis'"> Click Here To Deposit</a>
        <p id="paytm" style="margin-left: 50px;"></p>
    </div>
</div>
<footer class="text-center text-lg-start bg-dark text-muted">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
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
              <i class="fas fa-gem me-3 text-secondary"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer
              content. Lorem ipsum dolor sit amet, consectetur adipisicing
              elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Products</h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
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
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p>
              <i class="fas fa-home me-3 text-secondary"></i> New York, NY
              10012, US
            </p>
            <p>
              <i class="fas fa-envelope me-3 text-secondary"></i>
              info@example.com
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
    <div
      class="text-center p-4"
      style="background-color: rgba(0, 0, 0, 0.025)"
    >
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/"
        >MDBootstrap.com</a
      >
    </div>
    <!-- Copyright -->
  </footer>


            <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
           
</body>

</html>