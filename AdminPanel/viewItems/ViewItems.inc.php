<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ViewItems.css" type="text/css">
    <title>Document</title>
</head>
<body>
</section>      
    <h1 class="header-link">
    <?php
        echo "Items";
    ?>

    </h1>
    <section class="right-nav">
        <?php
            $stm = $conn->prepare("SELECT * FROM itemphoto WHERE display = 1");
            $stm->execute();
            $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stm->fetchAll();

            if(sizeof($result) != 0){   
                if(sizeof($result)%4 == 0){
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 25% 25% 25% 25%;\">";
                } elseif(sizeof($result)%3 == 0){
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 33.33% 33.33% 33.33%;\">";                        
                } elseif(sizeof($result)%2 == 0){
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 50% 50%;\">";
                } else{
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 50% 50%;\">";
                }
                echo "";
           
            foreach($result as $row){
                echo "<div class=\"item\">";
                echo "<img src='../adminDataBase/itemUploads/".$row['photo']."'>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </section>

    <section class="left-nav">
        <div class="modify" onclick="location.href='../adminPanel.inc.php'">Main menu</div>
        <div class="modify" onclick="location.href='../addItems/AddItems.inc.php'">Add Item</div>
        <div class="modify">Remove seller</div>
        <div class="modify">Orders</div>
        <div class="modify">Add orders</div>
        <div class="modify">Cart</div>
        <div class="modify">Update seller</div>
        <div class="modify">Update Order</div>
        <div class="modify">Dashbord</div>
        <div class="modify">New Feature</div>
</section>


</body>
</html>