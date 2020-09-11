<?php
    include "db.php";
    try {
        $stmt = $conn->prepare("INSERT INTO USER (username, email, password, role, profilefile )
        VALUES (:uname, :uemail, :upassword, :role, :profilefile )");

        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':uemail', $uemail);
        $stmt->bindParam(':upassword', $upassword);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':profilefile ', $profilefile);

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
