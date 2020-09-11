<?php
    include "db.php";
    try {
        $stmt = $conn->prepare("INSERT INTO USER (username, EMAIL, PASSWORD, ROLE)
        VALUES (:uname, :uemail, :upassword, :role)");

        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':uemail', $uemail);
        $stmt->bindParam(':upassword', $upassword);
        $stmt->bindParam(':role', $role);

        $uname = $_GET['username'];
        $uemail = $_GET['email'];
        $upassword = $_GET['password'];
        $role = 1;
        $stmt->execute();

        if ( $stmt->rowCount() == 1) {
            echo "OK";
        } else {
           header("location:DataBase_Connect.php?er=1");  
        }

    } catch(PDOException $e) {
        header("location:DataBase_Connect.php?er=1");
    }
  $conn = null;

?>
