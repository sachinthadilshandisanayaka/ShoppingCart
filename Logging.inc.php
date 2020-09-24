<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <title>Document</title>
</head>
<body>
<form action="SignUp.inc.php" class="navigate-logging">
        <button type="submit">Sign up</button>
    </form>

    <div class="display-message" id="display-message">
        <?php
            if(isset($_REQUEST['er'])){
                if($_REQUEST['er'] == 1){
                    echo "<span onclick=\"document.getElementById('display-message').style.display='none';\">&times;</span>";
                    echo "<h4>Loging Error</h4>";
                }
                if($_REQUEST['er'] == 2){
                    echo "<span onclick=\"document.getElementById('display-message').style.display='none';\">&times;</span>";
                    echo "<p>Create an account</p>";
                }
            }
        ?>
    </div>

    <form action="SignDataBaseConnection/LogInDataBase.inc.php" method="POST" class="form-1">
        <h2>Logging</h2>
        <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <input type="email" name="email" placeholder="Email"> <br><br>
        <label for="password">Password</label> <input type="password" name="password" placeholder="Password"> <br><br>
        <?php
        if(isset($_REQUEST['er2'])){
            if($_REQUEST['er2'] == 1){
                echo "check email and password<br><br>";
            }
        }
    ?>
        <button type="submit" value="submit" class="button1">Log In</button>
    </form>

</body>
</html>