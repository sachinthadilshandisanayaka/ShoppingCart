<?php
    require '../../../SignDataBaseConnection/db.inc.php';
    
    try {
        $stm = $conn->prepare("INSERT INTO selleritems (IDescription,IPrice,IQuntity,SupID,IName) VALUES 
        (:ides,:iprice,:iqun,:isid,:iname)");

    } catch(PDOException $e){
        echo $e;
    }
?>