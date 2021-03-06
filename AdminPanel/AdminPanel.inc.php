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
<section class="error-show" id="error-show">
        <?php
            if(isset($_REQUEST['sl'])){
                if($_REQUEST['sl'] == 1){
                    echo "<span onclick=\"document.getElementById('error-show').style.display='none';\">&times;</span>";
                    echo "<p>Seller added success</p><br>";
                }
            }
            if(isset($_REQUEST['itm'])){
              if($_REQUEST['itm'] == 1){
                  echo "<span onclick=\"document.getElementById('error-show').style.display='none';\">&times;</span>";
                  echo "<p>Seller and item added success</p><br>";
              }
          }
        ?>
</section>      
    <h1 class="header-link">
    <?php
        echo "Admin Panel works";
    ?>

    </h1>
    <section class="right-nav">

    </section>

    <section class="left-nav">
        <div class="modify" onclick="document.getElementById('id01').style.display='block'">Add seller</div>
        <div class="modify" onclick="location.href='addItems/AddItems.inc.php'">Add Item</div>
        <div class="modify" onclick="location.href='viewItems/ViewItems.inc.php'">View Items</div>
        <div class="modify" onclick="location.href='viewSeller/ViewSeller.inc.php'">View Seller</div>
        <div class="modify" onclick="location.href='removeSeller/RemoveSeller.inc.php'">Remove seller</div>
        <div class="modify">Orders</div>
        <div class="modify">Add orders</div>
        <div class="modify">Cart</div>
        <div class="modify">Update seller</div>
        <div class="modify">Update Order</div>
        <div class="modify">Dashbord</div>
        <div class="modify">New Feature</div>
    </section>

<div id="id01" class="modal">
  
  <form class="modal-content animate" id="form-01" action="adminDataBase/addSellerDataBase.inc.php" method="POST" enctype="multipart/form-data">
    <div class="imgcontainer">
      <span onclick="closeFunction()" class="close" title="Close Modal">&times;</span>
      <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>
    <h1 class="header-addSeller">ADD SELLER</h1>
    <div class="container">

      <label for="Profile"><b>Profile Photo</b></label>
      <input type="file" name="file" id="ProfilePicture" accept="image/*" style="padding: 10px;">

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="emiil"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="uemail" required>

      <label for="address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" name="uaddress" required>

      <label for="phone"><b>Phone number</b></label>
      <input type="tel" placeholder="Telephone" name="telephone" pattern="[0-9]{10}">

      <div class="add-item-button">
      <b><p style="color: #3498DB;">Add Item</p></b>
        <label class="switch">
          <input type="checkbox" class="input" onclick="addItem()">
          <span class="slider round"></span>
        </label>
      </div>

      <div class="add-items" id="add-items" style="display: none;">
      
        <label for="ProductPhoto"><b>Item Photo</b></label>
        <input type="file" name="pfile" class="inputItems" id="inputItems0">
        <input type="radio" name="selectImage" id="selectImage1" value="1">

        <label for="ProductPhoto"><b>Item Photo</b></label>
        <input type="file" name="pfile2" class="inputItems" id="inputItems5">
        <input type="radio" name="selectImage" id="selectImage2" value="2">

        <label for="ProductPhoto"><b>Item Photo</b></label>
        <input type="file" name="pfile3" class="inputItems" id="inputItems6">
        <input type="radio" name="selectImage" id="selectImage3" value="3">

        <label for="ProductName"><b>Product Name</b></label>
        <input type="text" placeholder="Product name" name="pdname" class="inputItems" id="inputItems1">

        <label for="ProductPrice"><b>Price</b></label>
        <input type="text" placeholder="Price" name="pdprice" class="inputItems" id="inputItems2">

        <label for="productname"><b>Description</b></label>
        <input type="text" placeholder="Description" name="pdDescription" class="inputItems" id="inputItems3">

        <label for="PQuantity"><b>Quantity</b></label>
        <input type="text" placeholder="Quantity" name="pdQuantity" class="inputItems" id="inputItems4"> 
   
      </div>
        
      <button type="submit">Add Seller</button>
     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>

function closeFunction(){
  document.getElementById('id01').style.display='none';
  document.getElementById("form-01").reset();
}
function closeFunction2(){
  document.getElementById("form-01").reset();
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        document.getElementById("form-01").reset();
    }
}
  function addItem() {
    var test = document.getElementById("add-items").style.display;

    if ( test == "none") {
      document.getElementById("add-items").style.display = "block";
      document.getElementById("inputItems1").required = true;
      document.getElementById("inputItems2").required = true;
      document.getElementById("inputItems3").required = true;
      document.getElementById("inputItems4").required = true;
      document.getElementById("inputItems5").required = true;
      document.getElementById("inputItems6").required = true;
      document.getElementById("selectImage1").required = true;
      document.getElementById("selectImage2").required = true;
      document.getElementById("selectImage3").required = true;
      
    } else {
      document.getElementById("add-items").style.display = "none";
      document.getElementById("inputItems1").required = false;
      document.getElementById("inputItems2").required = false;
      document.getElementById("inputItems3").required = false;
      document.getElementById("inputItems4").required = false;
      document.getElementById("inputItems5").required = false;
      document.getElementById("inputItems6").required = false;
      document.getElementById("selectImage1").required = false;
      document.getElementById("selectImage2").required = false;
      document.getElementById("selectImage3").required = false;
      
    }
    
  }
</script>

</body>
</html>