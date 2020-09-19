<?php
    require "../../SignDataBaseConnection/db.inc.php";
    echo "works";

    $sql = "SELECT * FROM sellerDetails WHERE SEmail=:semail";
?>