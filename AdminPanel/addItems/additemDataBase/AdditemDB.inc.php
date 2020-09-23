<?php
    require '../../../SignDataBaseConnection/db.inc.php';

    $PDescription = trim($_REQUEST['itemDesc']);
    $PPrice = trim($_REQUEST['itemPrice']);
    $PQuantity = trim($_REQUEST['itemQuantity']);
    $SID = trim($_REQUEST['sellerid']);
    $PName = trim($_REQUEST['itemName']);

    try {
        $stm = $conn->prepare("INSERT INTO selleritems (IDescription,IPrice,IQuntity,SupID,IName) VALUES 
        (:ides,:iprice,:iqun,:isid,:iname)");
        $stm->bindParam(':ides', $PDescription);
        $stm->bindParam(':iprice', $PPrice);
        $stm->bindParam(':iqun', $PQuantity);
        $stm->bindParam('isid', $SID);
        $stm->bindParam(':iname', $PName);
        $stm->execute();

        if($stm->rowCount() == 1){
            header("Location: ../AddItems.inc.php?er=1");
        }

    } catch(PDOException $e){
        echo $e;
    }
?>