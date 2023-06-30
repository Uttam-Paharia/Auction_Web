<?php
if($to_person!=0)
{
    $bidded_shells_person;
    $total_shells_person;
    $phone_person;
    $query="SELECT bidded_shells,total_shells,phone FROM `user_details` WHERE username='$to_person'";//GIVE TO PERSON
    $result = $conn->query($query);

if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $bidded_shells_person=$row['bidded_shells'];
    $total_shells_person=$row['total_shells'];
    $phone_person=$row['phone'];
}
$current_price;
$product_name;
$ext;
$query="SELECT current_price ,product_name,image_ext FROM `objects` WHERE product_id='$product_id'";//GIVE PRODUCTID
$result = $conn->query($query);
if ($result === false) {
    die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
    $current_price=$row['current_price'];
    $product_name=$row['$product_name'];
    $ext=$row['image_ext'];
}
$unbidded_shells_seller;
$total_shells_seller;
$phone_seller;
$query="SELECT unbidded_shells,total_shells,phone FROM `user_details` WHERE username='$seller'";//GIVE $seller
$result = $conn->query($query);

if ($result === false) {
die("Error retrieving data: " . $conn->error);
}

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$unbidded_shells_seller=$row['unbidded_shells'];
$total_shells_seller=$row['total_shells'];
$phone_seller=$row['phone'];
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



?>