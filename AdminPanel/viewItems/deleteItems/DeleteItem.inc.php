<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require '../../../SignDataBaseConnection/db.inc.php';
        if(isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];

            try {
                $stm = $conn->prepare("DELETE FROM selleritems WHERE id=:id");
                $stm->bindParam(':id', $id);
                $stm->execute();
                $stm2 = $conn->prepare("DELETE FROM itemphoto WHERE PID=:id");
                $stm2->bindParam(':id', $id);
                $stm2->execute();

                if($stm->rowCount() >0 && $stm2->rowCount() > 0) {
                    header("Location: ../ViewItems.inc.php?sc=1");
                }


            } catch(PDOException $e) {
                echo "ERROR :".$e->getMessage();
            }
           
        } else {
            header("Location: ../ViewItems.inc.php");
        }


    ?>
</body>
</html>