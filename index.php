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
    <a class="navbar-brand" href="#">AUA</a>
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
          <a class="nav-link" href="services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contacts.php">Contacts</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
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
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="projectimages/easybuysell.jpeg" alt="Our logo" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="projectimages/auction2.jpeg" alt="Auction" width="1100" height="500">
      </div>
      <div class="carousel-item">
        <img src="projectimages/car.jpeg" alt="Biding" width="1100" height="500">
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
          <h2 class="display-4">Lorem, ipsum dolor.</h2>
          <p class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae aliquam quidem
            repellendus minus quisquam reprehenderit? Sit reprehenderit iste libero exercitationem laudantium porro,
            saepe, aliquid provident praesentium cum sed, impedit voluptatibus obcaecati minima doloremque pariatur.</p>
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
        <div class="col-lg-6 col-md-6 col-12 buysell">
          <div class="card buysell">
            <img class="card-img-top imaag" src="projectimages/Buy.jpeg" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">BID</h4>
              <p class="card-text"> Lorem ipsum dolor sit amet. </p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 buysell">
          <div class="card buysell">
            <img  class="card-img-top imaag" src="projectimages/Sell.png" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">SELL</h4>
              <p class="card-text">Lorem ipsum dolor sit amet.</p>
              <a href="#" class="btn btn-primary">See Profile</a>
            </div>
          </div>
      </div>
    </div>
    </div>

  </section>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>