<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="SignUp.php" class="navigate-logging">
        <button type="submit">Sign up</button>
    </form>
    <form action="SignDataBaseConnection/LogInDataBase.inc.php" method="POST">
        <h2>Logging</h2>
        <label for="email">Email</label> <input type="email" name="email" placeholder="Email"> <br><br>
        <label for="password">Password</label> <input type="password" name="password" placeholder="Password"> <br><br>
        <input type="submit" value="submit">
    </form>

</body>
</html>