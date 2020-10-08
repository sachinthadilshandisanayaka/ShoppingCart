<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/viewSeller.css">
    <link rel="stylesheet" href="css/viewSeller.css">
    <script src=""></script>
    <title>View seller</title>
</head>
<body>
<a href="../AdminPanel.inc.php" class="back"><button>Back</button></a>

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
                echo "<p class=\"seller-image\"> 
                    <img src=\"../adminDataBase/uploads/".$photoName."\">
                </p>";
                echo "<p>Name : ".$row['sname']."</p>";
                echo "<p>address : ".$row['saddress']."</p>";
                echo "<p>email : ".$row['semail']."</p>"; 
                echo "<p>phone number : ".$row['sphone']."</p>";
                echo "</div>";
            }   
        }
        echo "</section>";
    ?>
    
</body>
</html>