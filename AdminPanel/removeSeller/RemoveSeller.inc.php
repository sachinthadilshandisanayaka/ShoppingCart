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
                            foreach ($result as $row) {
                                $photoName = $row['sphoto'];
                                $passValue = $row['sname'];
                                if ($row['sphoto'] == null) {
                                    $photoName = "defaultP.png";
                                }
                            
                                echo "<div class=\"seller\">";
                                echo "<div class=\"seller_image\">
                                        <img src=\"../adminDataBase/uploads/".$photoName."\">
                                        </div>";
                                echo "<div>";
                                echo "<p>Name : ".$row['sname']."</p>";
                                echo "<p>address : ".$row['saddress']."</p>";
                                echo "<p>email : ".$row['semail']."</p>";
                                echo "<p>phone number : ".$row['sphone']."</p>";
                                echo "</div>";
                                echo "<a class=\"delete\" onclick=\"openFunction('".$result[$x]['PID']."')\">Delete item</a>";
                                echo "</div>"; // seller class
                            }

                            echo "</section>";
                        }

                } catch(PDOException $e) {
                    echo "Error :".$e;
                }

            ?>
        </div>
    </section>

</body>

<script>
function closeFunction() {
    document.getElementById('delete-item').style.display = "none";
    document.getElementById("yes-no").getAttributeNode("href").value = "";
}

function openFunction(event) {
    document.getElementById('delete-item').style.display = "block";
    document.getElementById("yes-no").getAttributeNode("href").value = "deleteItems/DeleteItem.inc.php?id=" + event;
}
</script>

</html>