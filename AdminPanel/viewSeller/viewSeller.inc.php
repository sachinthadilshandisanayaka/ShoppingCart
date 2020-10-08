<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/viewSeller.css">
    <script src=""></script>
    <title>View seller</title>
</head>
<body>
    <?php
        $stm = $conn->prepare("SELECT * FROM sellerdetails");
        $stm->execute();
        $result = $stm->fetchAll();

        echo "<section class=\"sellers\">";

        if(sizeof($result) == null) {
            echo "<div class=\"seller\"> No sellers </div>";
        } else {
           
            foreach($result as $row) {
                $photoName = $row['sphoto'];
                $passValue = $row['sname'];
                if($row['sphoto'] == null){
                    $photoName = "defaultP.png";
                }

                echo "<div class=\"seller\">";
                echo "<div> 
                    <img src=\"../adminDataBase/uploads/".$photoName."\">
                </div>";
                echo "<p>Name : ".$row['sname']."</p>";
                echo "<p>Name : ".$row['saddress']."</p>";
                echo "<p>Name : ".$row['semail']."</p>"; 
                echo "<p>Name : ".$row['sphone']."</p>";
            } 
            echo "</div>";
        }

        echo "</section>";
    ?>
    
</body>
</html>