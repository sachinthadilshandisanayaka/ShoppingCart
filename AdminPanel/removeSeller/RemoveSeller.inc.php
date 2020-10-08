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
                    $stm = $conn->prepare("SELECT * FROM ");

                } catch(PDOException $e) {
                    echo "Error :".$e;
                }

            ?>
        </div>
    </section>
    
</body>
</html>