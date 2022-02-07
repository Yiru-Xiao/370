<?php
	session_start();
	include 'backendScript/dbh.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>


	<link rel="stylesheet" type="text/css" href="static/login2.css">
	<link rel="stylesheet" type="text/css" href="static/login1.css">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">




	<title>Login</title>
</head>

<body>

<!------------------------------  Navigation -------------------------->
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <!--<a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>-->
                <a class="nav-brand" href="home.php">Idlefish</a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Category</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="house.php">Real Estate</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="car.php">Vehicles</a></li>
    
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="clothes.php">Clothes</a></li>
            
                                    </ul>

                                    <ul class="single-mega cn-col-4">
                                        <li class="title"><a href="technology.php">Technology</a></li>
         
                                </div>
                            </li>

                            <li><a href="about.php">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="search_results.php" method="POST">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit" name = "submit-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>


          <?php
          // if user login
          if (isset($_SESSION['id'])) {
            echo
             '
            <div class="user-login-info">
                <a href="account.php"><img src="static/iimg/core-img/user.svg" alt=""></a>
            </div>



            <div class="cart-area">
                <a href="favorite.php" id="essenceCartBtn"><img src="static/iimg/core-img/heart.svg" alt=""></a>
            </div>

            <div class="favourite-area">
                <a href="sell_items.php">Items</a>
            </div>


            <div class="favourite-area">
                <a href="backendScript/logout_process.php">Logout</a>
            </div>';
          }
          else{
            echo
             '
            <div class="favourite-area">
                <a href="login.php">Login</a>
            </div>

            <div class="favourite-area">
                <a href="signup.php">Signup</a>
            </div>';
          }
        ?>
        
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->





<!------------------------------  Page Content-------------------------->
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(static/img/lg1.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
				<form class="login100-form validate-form" action="backendScript/login_process.php" method="POST">
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					  	<?php
					  		if ( isset($_GET['email']) ) {
					  			$email = $_GET['email'];
					  			echo '<input class="input100" type="text" name="email"  value='.$email.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="email" placeholder="Enter email">';
					  		}
					  	?>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">

						<input class="input100" type="password" name="pwd" placeholder="Enter password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-15 p-b-15">
						<div class="contact100-form-checkbox">
						  <div class="form-group form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						    <label class="custom" for="exampleCheck1">Remember me</label>
						  </div>
						</div>


						<div>
							<a href="forgetPassword.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button name = "submitLogin" class="login100-form-btn">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-15 p-b-20">
						<span class="custom">
							Don't have an account? <a href="signup.php">Sign Up</a>
						</span>

					<!-- login error handlers -->
					<?php
						if ( !isset($_GET['login']) ) {
						}
						else{
							$loginCheck = $_GET['login'];
							switch ($loginCheck) {
				                case 'empty':
				                    echo "<p style='color:red;'>Please enter a email and password!</p>";
				                    break;
								case 'noThisUser':
									echo "<p style='color:red;'>Oops!!! User email does not exist!</p>";
									break;
								case 'incorrectPassword':
									echo "<p style='color:red;'>Oops!!! Incorrect password!</p>";
									break;
							}
						}

						if ( !isset($_GET['signup']) ) {
						}
						else{
							$signCheck = $_GET['signup'];
							switch ($signCheck) {
								case 'success':
									echo "<p style='color:blue;'>Your account has been created!!</p>";
									break;
							}
						}

				        if ( !isset($_GET['reset']) ) {
				        }
				        else{
				            $resetCheck = $_GET['reset'];
				            switch ($resetCheck) {
				                case 'resetSuccess':
				                    echo "<p style='color:blue;'>Your password has been reset!!</p>";
				                    break;
				            }
				        }
					?>
					</div>

				</form>

				<div class="login100-more" style="background-image: url('static/img/cart.jpg');">
				</div>
			</div>
		</div>
	</div>
	




    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="static/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="static/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="static/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="static/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="static/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="static/js/active.js"></script>




	<script src="static/js/login.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	

</body>
</html>