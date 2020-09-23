<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Additems.css">
    <title>Document</title>
</head>
<body>
    <div class="sellers">
        <h1>SELLERS</h1>
        <?php
        try{
            $stm = $conn->prepare("SELECT * FROM sellerdetails");
            $stm->execute();
            $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stm->fetchAll();
            if ( !$result){
                echo "can not";
            }
            if ($result == null) {
                echo "<p>No Sellers</p>";
            } else{
                $itemCount = $stm->rowCount();
                if ($itemCount == 1 ){
                     
                } elseif($itemCount == 2) {
                    
                }
                foreach($result as $row){
                    echo "<div class='seller'>
                    <div class='seller-detail'>
                        <p>Name :".$row['SNAME']."</p><p>Address :".$row['SADDRESS']."</p><p>Email :".$row['SEMAIL']."</p><p>Phone number:".$row['SPHONE']."<br>
                    </div>
                    <div class='seller-image'>
                         <img src='../adminDataBase/uploads/".$row['SPHOTO']."' alt='' >
                    </div>
                           </div>";
                    // echo $row['SName']." ".$row['SAddress']."<br>";
                }
            }
        } catch(PDOException $e) {
            echo $e;
        }
          
        ?>
    </div>

</body>
</html>