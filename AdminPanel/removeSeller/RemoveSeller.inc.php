<?php
 include '../../SignDataBaseConnection/db.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/RemoveSeller.css">
    <title>Remove Seller</title>
</head>

<body>
    <h1>Remove Seller</h1>
    <a href="../AdminPanel.inc.php" class="back"><button>Back</button></a>

    <section class="Body">
        <div class="allSellers">
            <?php
                try{
                    $stm = $conn->prepare("SELECT * FROM sellerdetails");
                    $stm->execute();
                    $result = $stm->fetchAll();

                    echo "<section class=\"sellers\">";

                        if(sizeof($result) == 0) {
                            echo "<div class=\"no_seller\"> No Sellers </div>";
                        } else {
                            echo "<div class=\"seller\">";
                                echo "<div class=\"seller_image\">
                                        <img src=\"../adminDataBase/uploads/".$photoName."\">
                                        </div>";
                                echo "<p>Name : ".$row['sname']."</p>";
                                echo "<p>address : ".$row['saddress']."</p>";
                                echo "<p>email : ".$row['semail']."</p>"; 
                                echo "<p>phone number : ".$row['sphone']."</p>";
                            echo "</div>"; // seller class
                        }

                    echo "</section>";

                } catch(PDOException $e) {
                    echo "Error :".$e;
                }

            ?>
        </div>
    </section>

</body>

</html>