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
$product_name;
$post_time;
$auction_duration;
$bid_time_increase;
$base_price;
$current_price;
$ext;


$query = "SELECT product_name,post_time,auction_duration,bid_time_increase,base_price,current_price ,image_ext FROM `objects` WHERE product_id='blah@16'";

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
    echo "No data found.";
}


?>
<?php
$product_id = "blah@16";
$username = substr($product_id, 0, strpos($product_id, '@'));
$name;
$phone;
$address;
$query = "SELECT name ,phone ,address FROM `user_details` WHERE username='blah'";

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
    echo "No data found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product_page.css?v=<?php echo time(); ?>">
    <title>Product</title>
</head>

<body>
    <div class="container">
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
                <form id="myForm" method="POST" onsubmit="return validateForm();">
                    <input type="number" id="inputField" name="inputField" placeholder="Place your Bid">
                    <button type="submit">Place Bid</button>
                    <img src="projectimages/pointing.png" height=100px id="animation">
                </form>
            </div>
            <div class='error'>
            <p id='error' ></p>
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
                        $min_bid=$current_price + 0.1 * $base_price;
                    } else {
                        echo $base_price;
                        $min_bid=$base_price;
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

    <script>
        function validateForm(){
            let bid=document.getElementById('inputField').value;
            if(bid=="" || bid.isNaN() || parseFloat(bid) % 1 != 0){
                document.getElementById('error').innerHTML='Enter a valid number'
                return false;
            }
            var xhttp = new XMLHttpRequest();
            var url = "product_Important.php";
            var method = "POST";           
            xhttp.open(method, url, true);
            document.getElementById('description').innerHTML='hello';
            xhttp.onreadystatechange = function() {
             if (this.readyState === 4 && this.status === 200) {
                const arr=this.responseText.split("@");
                document.getElementById('description').innerHTML='descriptionsdgs';
      // Response from PHP file
                if(arr[0]=='false'){
                    document.getElementById('description').innerHTML='description';
                    document.getElementById('error').innerHTML='Your bid is lower than the Minimum bid';
                    document.getElementById('error').innerHTML=arr[1];
                    return false;
                }
                else{
                    document.getElementById('description').innerHTML='descri';
                }
      // Optionally, you can perform any additional actions based on the response
                }
            };
            xhttp.send("inputField=" + bid);
        }
        return true;
        
        
    </script>
</body>

</html>