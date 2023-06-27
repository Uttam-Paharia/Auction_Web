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

<?php
                // SQL QUERY
                $name;
                $total_shells;
                $bidded_shells;
                $unbidded_shells;
                $email;
                $phone;
                $address;
                $query = "SELECT name ,total_shells, bidded_shells, unbidded_shells,email,phone ,address FROM `user_details` WHERE username='blah'";
                  
                // FETCHING DATA FROM DATABASE
                $result = $conn->query($query);
          
                if ($result === false) {
                    die("Error retrieving data: " . $conn->error);
                }
                  
                if ($result->num_rows > 0) {
                    // OUTPUT DATA OF THE ROW
                    $row = $result->fetch_assoc();
            
                    // Print the values of total_shells, bided_shells, and unbided_shells
                    $name=$row['name'];
                    $total_shells = $row['total_shells'];
                    $bidded_shells = $row['bidded_shells'];
                    $unbidded_shells = $row['unbidded_shells'];
                    $email=$row['email'];
                    $phone=$row['phone'];
                    $address=$row['address'];
                   
                } else {
                    echo "No data found.";
                }
                  
                $conn->close();
              ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile_2.css?v=<?php echo time(); ?>">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css?v=<?php echo time(); ?>"
    />
    <script
      src="https://kit.fontawesome.com/4a8a1a882e.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
      <a class="navbar-brand" href="projectimages/logo-white.png"
        ><img
          src="projectimages/logo-white.png"
          width="50"
          height="50"
          alt="logo_image"
      /></a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.html"
              >About<span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bid.html">Bid</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sell.html">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacts.html">Contacts</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Search
          </button>
        </form>
      </div>
    </nav>
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="main"> 
        <div class="initial"><p id="initial">A</p></div>
        <div class="info">
            <div class="container">
                <div class="item"><p>Name</p></div>
                <div id="Name"><p><?php echo $name?></p></div>
                <div class="item"><p>Total Shells</p></div>
                <div id="Total_shells"><p><?php echo $total_shells?></p></div>
                <div class="item"><p>Bid Shells</p></div>
                <div id="bid_shells"><p><?php echo $bidded_shells?></p></div>
                <div class="item"><p>Unbid Shells</p></div>
                <div id="unbid_shells"><p><?php echo $unbidded_shells?></p></div>
                <div class="item"><p>Email</p></div>
                <div id="email"><p><?php echo $email?></p></div>
                <div class="item"><p>Phone</p></div>
                <div id="phone"><p><?php echo $phone?></p></div>
                <div class="item"><p>Address</p></div>
                <div id="address"><p><?php echo $address?></p></div>
                
            </div>
        </div>
    </div>
    <div class="black">
        <img src="projectimages/withdraw.png" id="withdraw" height=300px title="CLick to withdraw">
        <img src="projectimages/deposit.png" id="deposit" height=300px title="Click to deposit">
        <div id="form">
            <form id="myForm">
                <input type="text" id="inputField" placeholder="Enter your text">
                <button type="submit">Submit</button>
              </form>
              
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
              let username='blah';
            //   document.getElementById('username_display').innerHTML="<span style='font-weight:bold;'>USERNAME:</span> "+username;
              document.getElementById('initial').innerHTML=username[0].toUpperCase();
        </script>
</body>
</html>