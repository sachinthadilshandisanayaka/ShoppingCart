<?php
    include "db.inc.php";
    $userPassword = trim(md5($_POST("password")));
    $email = trim($_POST("email"));

     try {
        $sql = "SELECT * FROM userdb WHERE email=:em AND password=:pw";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':um',$email);
        $stmt->bindParam(':pw',$userPassword);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            echo "LogIn Successfully";
        } else {
            header("Location: ../Logging.inc.php?er2=1");
        }
       
    } catch(PDOException $e) {
        header("Location: ../Logging.inc.php?er=1");
    }
  $conn = null;

?>
