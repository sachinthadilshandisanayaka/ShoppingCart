<?php
    require '../../../SignDataBaseConnection/db.inc.php';

    $PDescription = ;
    $PPrice = ;
    $PQuantity = ;
    $SID = ;
    $PName = ;

    try {
        $stm = $conn->prepare("INSERT INTO selleritems (IDescription,IPrice,IQuntity,SupID,IName) VALUES 
        (:ides,:iprice,:iqun,:isid,:iname)");
        $stm->bindParam(':ides', $PDescription);
        $stm->bindParam(':iprice', $PPrice);
        $stm->bindParam(':iqun', $PQuantity);
        $stm->bindParam('isid', $SID);
        $stm->bindParam(':iname', $PName);
        $stm->execute();

    } catch(PDOException $e){
        echo $e;
    }
?>