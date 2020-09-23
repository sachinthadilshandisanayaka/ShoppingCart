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
    <div class="sellers">
        <h1>Add Items for each sellers</h1>
        <?php
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
                    if($row['SPHOTO'] == null){
                        $photoName = "defaultP.png";
                    }
                    echo "<div class='seller min5' onclick='openForm()' value=".$row['SNAME']." id='seller'>
                    <span>click for add item</span>
                    <div class='seller-detail'>
                        <p>Name :".$row['SNAME']."</p><p>Address :".$row['SADDRESS']."</p><p>Email :".$row['SEMAIL']."</p><p>Phone number:".$row['SPHONE']."<br>
                    </div>
                    <div class='seller-image'>
                         <img src='../adminDataBase/uploads/".$photoName."' alt='' >
                    </div>
                           </div>";
                    // echo $row['SName']." ".$row['SAddress']."<br>";
                }
            }
        } catch(PDOException $e) {
            echo $e;
        }
          
        ?>
        <div id="id01" class="modal">
            <span onclick="closeForm()" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="/action_page.php" id="form-01">
                <div class="container">
                <h1>Add Item</h1>
                <p id="seller-name"></p>
                <hr>
                    <label for="itemName"><b>Item Name</b></label>
                    <input type="text" placeholder="Item name" name="itemName" required>

                    <label for="price"><b>Price</b></label>
                    <input type="text" placeholder="Price" name="itemPrice" required>

                    <label for="Description"><b>Description</b></label>
                    <input type="password" placeholder="Description" name="itemDesc" required>

                    <label for="Quantity"><b>Quantity</b></label>
                    <input type="text" placeholder="Quantity" name="itemQuantity" required>

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
function openForm(){
    document.getElementById('id01').style.display='block';
    event = document.getElementById('seller').getAttributeNode("value").value;
    document.getElementById('seller-name').innerHTML = "Seller name : " + event;
}
function closeForm(){
    document.getElementById('id01').style.display='none';
    document.getElementById('form-01').reset();
}
</script>

    </div>

</body>
</html>