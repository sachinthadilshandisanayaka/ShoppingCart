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

    </section>

    <section class="left-nav">
        <div class="modify" onclick="document.getElementById('id01').style.display='block'">Add seller</div>
        <div class="modify" onclick="location.href='addItems/AddItems.inc.php'">Add Item</div>
        <div class="modify">View Items</div>
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