<?php require("register.class.php");?>
<?php 
    if(isset($_POST["submit"])){
        $user = new RegisterUser($_POST['username'],$_POST['password']);
    }
?>
<!doctype html>
<html lang="en">
<head>
  <title>Webleb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="login.css" rel="stylesheet">
</head>
<body>
  <div class="login-box">
    <h2>Register</h2>
    <form action="" method="post" entype="multipart/form-data" autocomplete="off">
      <div class="user-box">
        <input type="text" name="username" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="text" name="password" required="">
        <label>Password</label>
      </div>
      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button type="submit" name="submit">Register</button>
      </a>
      <p class="error"></p>
        <p class="success" ></p>

       <p class="error" ><?php echo @$user->error?></p>
       <p class="error" ><?php echo @$user->success?></p>
    </form>
  </div>
</body>
</html>
