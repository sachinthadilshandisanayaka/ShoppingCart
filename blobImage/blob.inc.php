<form action="blob.inc.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button type="submit" name="submit">ok</button>
</form>
<script>

    // var hasNumber = /\d/;
    // alert(!hasNumber.test("hello"));

</script>
<?php
    // require '../SignDataBaseConnection/db.inc.php';

    if(isset($_POST['submit'])){
        $imageData = file_get_contents($_FILES['file']['tmp_name']);

        // echo $imageData;
        // header("content-type : image/png");
        echo "<img src=\"data:image/jpeg;base64,".base64_encode($imageData)."\">";
        echo "<img src=\"data:image/jpeg;base64,".$imageData."\">";
        // echo "<img src='data;image/png_code64, ".base64_encode($imageData)."'>";
              
    }
   

?>
<!--  -->