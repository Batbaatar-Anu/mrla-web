<?php require("register.class.php");?>
<?php require("login.class.php");?>
<?php 
    if(isset($_POST["login"])){
		// Process login form data
		$user = new LoginUser($_POST['username'], $_POST['password']);
	}
	
	if(isset($_POST["register"])){
		// Process registration form data
		$user = new RegisterUser($_POST['username'], $_POST['password']);
	}
	
?>
	

<!doctype html>
<html lang="en">
<head>
  <title>R&L</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="login.css">	
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Register</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
										<form action="" method="post"  enctype="multipart/form-data" autocomplete="off" >

											<div class="form-group">
												<input type="text" name="username" class="form-style" placeholder="username">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="text" name="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="" type="submit" name="login" class="btn mt-4">Login</a>
                      </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">

											<h4 class="mb-3 pb-3">Register</h4>
											
											<form action="" method="post" entype="multipart/form-data" autocomplete="off" >
					
                      <div class="form-group mt-2">
												<input type="text" name="username" class="form-style" placeholder="username">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="text" name="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="" type="submit" name="register" class="btn mt-4">Register</a>
											</form>
				      					</div>

										<p class="error"></p>
        								<p class="success" ></p>

										<p class="error"><?php echo @$user->error ?></p>
                                        <p class="success"><?php echo @$user->success ?></p>  
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>
