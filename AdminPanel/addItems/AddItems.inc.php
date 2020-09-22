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
            $result = $stm->fetchAll();
            if ( !$result){
                echo "can not";
            }
            if ($result == null) {
                echo "<p>No Sellers</p>";
            } else{
                foreach($result as $row){
                    echo "<div class='seller'>
                    <div class='seller-image'>
                    <img src='../adminDataBase/uploads/5f6a3d7e936cf8.24887762.jpg' alt='' >
                     </div>
                           <p>".$row['SNAME']."</p><br><p>".$row['SADDRESS']."</p><br><p>".$row['SEMAIL']."</p><br>
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