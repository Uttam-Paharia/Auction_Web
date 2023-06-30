<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$password = "";
$databasename = "AUA";

// CREATE CONNECTION
$conn = new mysqli($servername, "root", $password, $databasename);
session_start();
$currentURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$equalsPos = strpos($currentURL, '=');
$product_id = substr($currentURL, $equalsPos + 1);

// GET CONNECTION ERRORS
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<?php
// SQL QUERY
$product_name;
$post_time;
$auction_duration;
$bid_time_increase;
$base_price;
$current_price;
$ext;
$query = "SELECT product_name,post_time,auction_duration,bid_time_increase,base_price,current_price ,image_ext FROM `objects` WHERE product_id='$product_id'";


// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    // OUTPUT DATA OF THE ROW
    $row = $result->fetch_assoc();

    $product_name = $row['product_name'];
    $post_time = $row['post_time'];
    $auction_duration = $row['auction_duration'];
    $bid_time_increase = $row['bid_time_increase'];
    $base_price = $row['base_price'];
    $current_price = $row['current_price'];
    $ext = $row['image_ext'];

} else {
    echo "No data found1. SQL Query: " . $query;
}


?>
<?php
$username_seller = substr($product_id, 0, strpos($product_id, '@'));
$name;
$phone;
$address;


$query = "SELECT name ,phone ,address FROM `user_details` WHERE username='$username_seller'";

// FETCHING DATA FROM DATABASE
$result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    // OUTPUT DATA OF THE ROW
    $row = $result->fetch_assoc();

    // Print the values of total_shells, bided_shells, and unbided_shells
    $name = $row['name'];
    $phone = $row['phone'];
    $address = $row['address'];

} else {
    echo "No data found2.";
}


?>
<!-- place bid validation
**************************************************************************************** -->
<?php
$login = false;
$showError1 = false;
$showError2 = false;
$showError3 = false;
$showError0 = false;
$error = 0;
$bid;
$to_person;
$query = "SELECT to_person FROM `$username_seller` where product_id='$product_id'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $to_person = $row['to_person'];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $bid = $_POST['inputField'];
    $username = $_SESSION['username'];
    $unbidded_shells;
    $auction_duration;
    $query = "SELECT unbidded_shells FROM `user_details` WHERE username='$username'";
    $result = $conn->query($query);

    if ($result === false) {
        die("Error retrieving data: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        // OUTPUT DATA OF THE ROW
        $row = $result->fetch_assoc();

        $unbidded_shells = $row['unbidded_shells'];
    

    } else {
        echo "No data found3.";
    }


    // Example values
    $post_time; // Post time in datetime format
    $auction_duration; // Auction duration in time format (H:m:s)

    // Convert post time to DateTime object
    $postDateTime = new DateTime($post_time);

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
        $showError0 = "The auction has ended";
    }

    if ($bid == "" && $showError0 == false) {
        $error = 1;
        $showError1 = 'Enter a valid input';
    } else if ($error == 0) {
        $query = "SELECT current_price FROM `objects` WHERE product_id='$product_id'";
        $result = $conn->query($query);

        if ($result === false) {
            die("Error retrieving data: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // OUTPUT DATA OF THE ROW
            $row = $result->fetch_assoc();

            $current_price = $row['current_price'];



        } else {
            echo "No data found4.";
        }
        $min_bid;
        if ($current_price) {
            $min_bid = $current_price + 0.1 * $base_price;
        } else {
            $min_bid = $base_price;
        }
        if ($min_bid > $bid) {
            $error = 2;
            $showError3 = 'You have bid less than Minimum Bid';
        }
    } if ($error == 0) {
        if ($bid > $unbidded_shells) {
            $error = 3;
            $showError0 = "You don't have enough unbid shells";
        }

    }
    if ($error == 0) {
        $current_price;
        $auction_duration;
        $unbidded_shells_prev;
        $unbidded_shells_now;
        $bidded_shells_prev;
        $bidded_shells_now;

        $query = "SELECT current_price, auction_duration FROM `objects` WHERE product_id='$product_id'";
        $result = $conn->query($query);

        if ($result === false) {
            die("Error retrieving data: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // OUTPUT DATA OF THE ROW
            $row = $result->fetch_assoc();

            $current_price = $row['current_price'];
            $auction_duration = $row['auction_duration'];

        } else {
            echo "No data found.";
        }
        if ($to_person=='0') {
            $query = "SELECT unbidded_shells,bidded_shells FROM `user_details` WHERE username='$to_person'";
            $result = $conn->query($query);

            if ($result === false) {
                die("Error retrieving data: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                // OUTPUT DATA OF THE ROW
                $row = $result->fetch_assoc();
                $unbidded_shells_prev = $row['unbidded_shells'];
                $bidded_shells_prev = $row['bidded_shells'];
            }
            $unbidded_shells_prev = $unbidded_shells_prev + $current_price;
            $bidded_shells_prev -= $current_price;
            $query = "UPDATE  `user_details` SET unbidded_shells =$unbidded_shells_prev,bidded_shells=$bidded_shells_prev WHERE username='to_person' ";
            $conn->query($query);



        }

        $query = "SELECT unbidded_shells,bidded_shells FROM `user_details` WHERE username='$username'";
        $result = $conn->query($query);

        if ($result === false) {
            die("Error retrieving data: " . $conn->error);
        }

        if ($result->num_rows > 0) {
            // OUTPUT DATA OF THE ROW
            $row = $result->fetch_assoc();
            $unbidded_shells_now = $row['unbidded_shells'];
            $bidded_shells_now = $row['bidded_shells'];
        }
        $unbidded_shells_now = $unbidded_shells_now - $bid;
        $bidded_shells_now += $bid;
        $query = "UPDATE  `user_details` SET unbidded_shells =$unbidded_shells_now,bidded_shells=$bidded_shells_now WHERE username='$username' ";
        $conn->query($query);
        $current_price = $bid;
        $auction_duration; // Auction duration in time format (H:m:s)
        $bid_time_increase; // Number of minutes to increase the auction duration

        // Split auction duration into hours, minutes, and seconds
        list($hours, $minutes, $seconds) = explode(':', $auction_duration);

        // Calculate the total minutes of the original auction duration
        $totalMinutes = ($hours * 60) + $minutes;

        // Add the bid time increase to the total minutes
        $totalMinutes += $bid_time_increase;

        // Calculate the updated hours and minutes
        $hours = floor($totalMinutes / 60);
        $minutes = $totalMinutes % 60;

        // Format the updated auction duration
        $auction_duration = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

        // Display the updated auction duration


        $query = "UPDATE `objects` SET current_price='$current_price',auction_duration='$auction_duration' WHERE product_id='$product_id'";
        $conn->query($query);
        $to_person = $username;
        $query = "UPDATE `username_seller` SET to_person='$to_person'WHERE product_id='$product_id' ";
        $login = true;
        header("location: product_page.php?product_id=$product_id");

    }

}
// function formValidation(){

// }


$conn->close();
?>
<?php
if ($showError0) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Unsuccessful!</strong> ' . $showError0 . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}
else if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Your bid has been successfully placed!</strong>Good Luck :) 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}

else if ($showError1) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Unsuccessful!</strong> ' . $showError1 . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
}
else if ($showError2) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Unsuccessful!</strong> ' . $showError2 . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
}
else if ($showError3) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Unsuccessful!</strong> ' . $showError3 . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> ';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="product_page.css?v=<?php echo time(); ?>">
    <title>
        <?php echo $product_name; ?>
    </title>
    
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
    <div class="containerr">
        <div class="item-1">
            <?php
            $image = 'uploads/' . $product_id . '.' . $ext;
            echo '<img src="' . $image . ' "alt="Product Image" id="image">';

            ?>
        </div>
        <div class="item-2">
            <h1 id="header">Product Name: <span id="name">
                    <?php echo $product_name ?>
                </span></h1>
            <p id="company" class="parallelogram"> <span style="color:orangered">AUA -</span><span style="color:white">
                    AUA Unlimited Auction</span></p>
            <div class="thematic-break"></div>
        </div>
        <div class="item-3">
            <p id="descri">Description:<br></p>
            <p id="description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rerum deleniti beatae modi
                cupiditate officia nisi quas, reprehenderit fugit. Eligendi accusantium consequatur facilis quia maiores
                dolore nisi saepe voluptate, quisquam doloribus.</p>
        </div>
        <div class="item-4">
            <p id='timer'>00:00:00</p>
        </div>
        <div class="item-5">
            <div class="current">
                <h2 id="curr">Current Bid</h2>
                <h1 id="current_bid">
                    <?php echo $current_price ?>
                </h1>
                <img src="projectimages/seashell.png" alt="sea shell" height=30px id="sea">
            </div>
            <div class="form">
                <form id="myForm" action="product_page.php?product_id=<?php echo $product_id; ?>" method="POST">
                    <input type="number" id="inputField" name="inputField" placeholder="Place your Bid">
                    <button type="submit">Place Bid</button>
                    <img src="projectimages/pointing.png" height=100px id="animation">
                </form>
            </div>
            <div class='error'>
                <p id='error'></p>
            </div>
            <div class="bass">
                <h3 class="base">Base Price</h3>
                <h1 id="base_price">
                    <?php echo $base_price ?>
                </h1>

                <img src="projectimages/seashell.png" alt="sea shell" height=30px id="sea">
            </div>
            <div class="bass">
                <h3 class="base">Minimum Bid</h3>
                <h1 id="min_bid">
                    <?php
                    $min_bid;
                    if ($current_price) {
                        echo $current_price + 0.1 * $base_price;
                        $min_bid = $current_price + 0.1 * $base_price;
                    } else {
                        echo $base_price;
                        $min_bid = $base_price;
                    }
                    ?>
                </h1>
                <img src="projectimages/seashell.png" alt="sea shell" height=30px id="sea">
            </div>
            <div class="thematic-break2"></div>
        </div>
        <div class="item-6"></div>
        <div class="item-7">
            <div class="icons">
                <div><img height=80px src="projectimages/delivery_within_2_days.png"><br>
                    <p class="p">Quick Delivery</p>
                </div>
                <div><img height=80px src="projectimages/trusted_sellers.png"><br>
                    <p class="p">Trusted Sellers</p>
                </div>
                <div><img height=80px src="projectimages/Get_a_chance_to_win_prizes.png"><br>
                    <p class="p">Win Prizes</p>
                </div>
                <div><img height=80px src="projectimages/for_any_issue_dial_our_helpline_number_immediately.png"><br>
                    <p class="p">24/7 Helpline Service</p>
                </div>
            </div>
            <div class="thematic-break3"></div>
            <div>
                <h3>Seller Details:</h3>
            </div>
            <div class="seller">
                <div>
                    <p style="font-weight:bold;">Name</p>
                </div>
                <div>
                    <p id="seller_name">
                        <?php echo $name ?>
                    </p>
                </div>
                <div>
                    <p style="font-weight:bold;">Phone</p>
                </div>
                <div>
                    <p id="seller_phone">
                        <?php echo $phone ?>
                    </p>
                </div>
                <div>
                    <p style="font-weight:bold;">Address</p>
                </div>
                <div>
                    <p id="seller_address">
                        <?php echo $address ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>

        var postTime = new Date("<?php echo date('Y-m-d H:i:s', strtotime($post_time)); ?>");
        var auctionDuration = "<?php echo $auction_duration; ?>";
        var parts = auctionDuration.split(":");
        var hours = parseInt(parts[0]);
        var minutes = parseInt(parts[1]);
        var seconds = parseInt(parts[2]);

        var auctionTime = (hours * 3600 + minutes * 60 + seconds) * 1000;

        function startTimer(postTime, auctionTime) {
            var currentTime = new Date();
            var endTime = new Date(postTime.getTime() + auctionTime);
            var remainingTime = endTime - currentTime;

            if (remainingTime < 0) {
                document.getElementById('timer').innerHTML = '00:00:00';
                return;
            }

            var hours = Math.floor(remainingTime / 3600000);
            remainingTime %= 3600000;
            var minutes = Math.floor(remainingTime / 60000);
            remainingTime %= 60000;
            var seconds = Math.floor(remainingTime / 1000);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            document.getElementById('timer').innerHTML = hours + ":" + minutes + ":" + seconds;
        }

        // Call the startTimer function initially
        startTimer(postTime, auctionTime);

        // Call the startTimer function periodically every second
        setInterval(function () {
            startTimer(postTime, auctionTime);
        }, 1000);


    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>