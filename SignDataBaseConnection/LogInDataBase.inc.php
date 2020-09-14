<?php
    include "db.inc.php";
    $userPassword = trim(md5($_POST("password")));
    $email = trim($_POST("email"));

     try {
        $sql = "SELECT * FROM userdb email=:em AND password=:pw";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':um',$email);
        $stmt->bindParam(':pw',$userPassword);
        $stmt->execute();
       
    } catch(PDOException $e) {
        header("location:DataBase_Connect.php?er=1");
    }
  $conn = null;

?>
