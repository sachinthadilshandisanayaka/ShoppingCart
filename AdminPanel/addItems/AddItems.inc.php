<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sellers">
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
                    echo $row['SName']." ".$row['SAddress']."<br>";
                }
            }
        } catch(PDOException $e) {
            echo $e;
        }
          
        ?>
    </div>

</body>
</html>