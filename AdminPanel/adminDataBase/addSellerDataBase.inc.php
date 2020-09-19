<?php
    require "../../SignDataBaseConnection/db.inc.php";
    echo "works";

    $SEmail = $_REQUEST['uemail'];
    
    $sql = "SELECT * FROM sellerDetails WHERE SEmail=:semail";
    $stm = $conn->prepare($sql);
    $stm->bindParam(':semail',$SEmail);
    $stm->execute();

    if ( $stm->rowCount() > 0) {
        echo "Email is already used";
    } else {
        echo "OK...";
    }

?>