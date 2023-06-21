<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "AUA";
     $conn = new mysqli($servername, $username, $password, $dbname);
     if($conn) echo "done"
    ?>