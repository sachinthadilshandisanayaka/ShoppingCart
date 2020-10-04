<?php
 $servername = "localhost";
 $username = "root";
 $password = "";

 try {
     $conn = new PDO("mysql:host=$servername;dbname=shoppingcart_2", $username, $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "Connected successfully";
    //  echo "<br>";

 } catch(PDOException $e) {
     echo "Connect failed :" .$e->getMessage();
     echo "<br>";
 }
?>