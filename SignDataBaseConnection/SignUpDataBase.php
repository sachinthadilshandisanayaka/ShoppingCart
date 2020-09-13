<?php
    require 'db.php';

    if(isset($_GET['submit'])){

        $file = $_FILES['ProfilePicture'];
        $fileName = $_FILES['ProfilePicture']['name'];
        $fileTmpName = $_FILES['ProfilePicture']['tmp_name'];
        $fileSize = $_FILES['ProfilePicture']['size'];
        $fileError = $_FILES['ProfilePicture']['error'];
        $fileType = $_FILES['ProfilePicture']['type'];

    }

?>