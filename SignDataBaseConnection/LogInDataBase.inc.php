<?php
    include "db.inc.php";
    // try {
        $stmt = $conn->prepare("INSERT INTO userdb (username, email, password, role )
        VALUES (:uname, :uemail, :upassword, :role)");

        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':uemail', $uemail);
        $stmt->bindParam(':upassword', $upassword);
        $stmt->bindParam(':role', $role);
        // $stmt->bindParam(':profilefile ', $profilefile);

        $uname = $_POST['username'];
        $uemail = $_POST['email'];
        $upassword = $_POST['password'];
        $role = 1;
        $stmt->execute();

        if ( $stmt->rowCount() == 1) {
            echo "OK";
        } else {
            echo 'error';
        //    header("location:DataBase_Connect.php?er=1");  
        }

    // } catch(PDOException $e) {
    //     header("location:DataBase_Connect.php?er=1");
    // }
  $conn = null;

?>
