<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("location: login.php");exit();
    }
    if(isset($_GET["logout"])){
        unset($_SESSION["user"]);
        header("location: login.php");exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Welcome <?php echo $_SESSION['user']; ?></h1>
        <a href="?logout">Log out</a>
    </header>
</body>
</html>