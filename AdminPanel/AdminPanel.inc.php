<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/AdminPanel.css">
    <title>Document</title>
</head>
<body>
    <h1 class="header-link">
    <?php
        echo "Admin Panel works";
    ?>

    </h1>
    <section class="right-nav">

    </section>

    <section class="left-nav">
        <div class="modify" onclick="document.getElementById('id01').style.display='block'">Add seller</div>
        <div class="modify">Remove seller</div>
        <div class="modify">Oders</div>
        <div class="modify">Add oders</div>
        <div class="modify">Cart</div>
        <div class="modify">Update seller</div>
        <div class="modify">Update Oder</div>
        <div class="modify">Dashbord</div>
        <div class="modify">New Feature</div>
    </section>
</head>
<body>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="adminDataBase/addSellerDataBase.inc.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>
    <h1 class="header-addSeller">ADD SELLER</h1>
    <div class="container">
    <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input type="file" name="file" id="ProfilePicture" accept="image/*" style="padding: 10px;">

    </div>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="emiil"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="uemail" required>

      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="uaddress" required>

      <label for="phone"><b>Phone number</b></label>
      <input type="number" placeholder="Telephone" name="uname">

      <!-- <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required> -->

      <!-- <label for="productname"><b>Product name</b></label>
      <input type="text" placeholder="Product name" name="productName" required>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required> -->
        
      <button type="submit">Add Seller</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>