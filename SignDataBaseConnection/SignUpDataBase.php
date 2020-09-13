<?php
    require 'db.php';

    if(isset($_GET['submit'])){

        $file = $_FILES['ProfilePicture'];
        $fileName = $_FILES['ProfilePicture']['name'];

    }

?>