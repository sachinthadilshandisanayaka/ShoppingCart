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
            
            $stm2 = $conn->prepare("SELECT IID,IDescription,IPrice,IQuntity,IName FROM selleritems WHERE exists 
            (SELECT PID from itemphoto where itemphoto.PID = selleritems.IID and itemphoto.display=1)");
            $stm2->execute();
            $result2 = $stm2->setFetchMode(PDO::FETCH_ASSOC);
            $result2 = $stm2->fetchAll();

            if(sizeof($result) != 0){   
                if(sizeof($result)%4 == 0){
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 22% 22% 22% 22%;\">";
                } elseif(sizeof($result)%3 == 0){
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 33% 33% 33%;\">";                        
                } else{
                    echo "<div class=\"display-item\" style=\"grid-template-columns: 45% 45%;\">";
                }
           
            // foreach($result as $row){
                for($x = 0; $x < sizeof($result); $x++){
                    echo "<div class=\"items\">";
                    echo "<img src='../adminDataBase/itemUploads/".$result[$x]['photo']."'>";
                    echo "<div class=\"item name\">".$result2[$x]['IName']."</div>";
                    echo "<div class=\"item id\">".$result2[$x]['IDescription']."</div>";
                    echo "<div class=\"item description\">".$result2[$x]['IPrice']."</div>";
                    echo "<div class=\"item price\">".$result2[$x]['IQuntity']."</div>";
                    echo "<div class=\"item quantity\">".$result2[$x]['IID']."</div>";
                    echo "</div>";
                }
               
            // }
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