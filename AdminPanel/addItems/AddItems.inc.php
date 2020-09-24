<?php
    require "../../SignDataBaseConnection/db.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Additems.css">
    <title>Document</title>
</head>
<body>
    <section class="error-show" id="error-show">
        <?php
            if(isset($_REQUEST['er'])){
                if($_REQUEST['er'] == 1){
                    echo "<span onclick=\"document.getElementById('error-show').style.display='none';\">&times;</span>";
                    echo "<p>UpDate Success</p>";
                }
            }
        ?>
    </section>
   
    <div class="sellers">
        <h1>Add Items for each sellers</h1>
        <?php

        $counter = 0;

        try{
            $stm = $conn->prepare("SELECT * FROM sellerdetails");
            $stm->execute();
            $result = $stm->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stm->fetchAll();
            if ( !$result){
                echo "can not";
            }
            if ($result == null) {
                echo "<p>No Sellers</p>";
            } else{
                $itemCount = $stm->rowCount();
                if ($itemCount  < 5 ){
                     
                } elseif($itemCount%2 == 0) {

                }
                foreach($result as $row){
                    $photoName = $row['SPHOTO'];
                    $passValue = $row['SNAME'];
                    if($row['SPHOTO'] == null){
                        $photoName = "defaultP.png";
                    }
                    echo "<div class='seller min5' onclick='openForm(this.id, ".$row['SID'].")' id='".$passValue."'>
                    <span>click for add item</span>
                    <div class='seller-detail'>
                        <p>Name :".$row['SNAME']."</p><p>Address :".$row['SADDRESS']."</p><p>Email :".$row['SEMAIL']."</p><p>Phone number:".$row['SPHONE']."</p>
                    </div>
                    <div class='seller-image'>
                         <img src='../adminDataBase/uploads/".$photoName."' alt='' >
                    </div>
                           </div>";
                    // echo $row['SName']." ".$row['SAddress']."<br>";
                    $counter++;
                }
            }
        } catch(PDOException $e) {
            echo $e;
        }
          
        ?>
        <div id="id01" class="modal">
            <span onclick="closeForm()" class="close" title="Close Modal">&times;</span>
            <form class="modal-content animate" action="additemDataBase/AdditemDB.inc.php" id="form-01" method="GET">
                <div class="container">
                <h1>Add Item</h1>
                <p id="seller-name"></p>
                <hr>
                    <input type="hidden" id="sellerId" name="sellerid" value="">
                    <label for="itemName"><b>Item Name</b></label>
                    <input type="text" placeholder="Item name" name="itemName" required>

                    <label for="price"><b>Price</b></label>
                    <input type="text" placeholder="Price" name="itemPrice" required>

                    <label for="Description"><b>Description</b></label>
                    <input type="text" placeholder="Description" name="itemDesc" required>

                    <label for="Quantity"><b>Quantity</b></label>
                    <input type="text" placeholder="Quantity" name="itemQuantity" required>

                    <label for="ProductPhoto"><b>Item Photo</b></label>
                    <div class="image">
                        <input type="file" name="pfile" class="inputItems" id="inputItems0" required>
                        <input type="radio" name="selectImage" id="selectImage1" value="1">
                    </div>

                    <label for="ProductPhoto2"><b>Item Photo</b></label>
                    <div class="image">
                        <input type="file" name="pfile2" class="inputItems1" id="inputItems1" required>
                        <input type="radio" name="selectImage" id="selectImage2" value="2">    
                    </div>
                    

                    <label for="ProductPhoto3"><b>Item Photo</b></label>
                    <div class="image">
                        <input type="file" name="pfile3" class="inputItems2" id="inputItems2" required>
                        <input type="radio" name="selectImage" id="selectImage3" value="3">    
                    </div>

                <div class="clearfix">
                    <button type="button" onclick="closeForm()" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Add Item</button>
                </div>
                </div>
            </form>
    </div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//     document.getElementById('form-01').reset();
//   }
// }
function openForm(event, event2){
    document.getElementById('id01').style.display='block';
    // event = document.getElementById('userName').getAttributeNode('placeholder').value;
     document.getElementById('seller-name').innerHTML = "Seller Name : "+ event + " ID " + event2;
     document.getElementById('sellerId').getAttributeNode('value').value = event2;
}
function closeForm(){
    document.getElementById('id01').style.display='none';
    document.getElementById('form-01').reset();
}
</script>

    </div>

</body>
</html>