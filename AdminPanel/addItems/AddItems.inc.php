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
                    echo "<div class='seller min5'>
                    <span>click for add item</span>
                    <div class='seller-detail'>
                        <p>Name :".$row['SNAME']."</p><p>Address :".$row['SADDRESS']."</p><p>Email :".$row['SEMAIL']."</p><p>Phone number:".$row['SPHONE']."<br>
                    </div>
                    <div class='seller-image'>
                         <img src='../adminDataBase/uploads/".$row['SPHOTO']."' alt='' >
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
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <form class="modal-content" action="/action_page.php">
                <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
                    
                    <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                    </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
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

    </div>

</body>
</html>