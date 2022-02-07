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


	<link rel="stylesheet" type="text/css" href="static/signup2.css">
	<link rel="stylesheet" type="text/css" href="static/signup1.css">
	<link rel="stylesheet" type="text/css" href="static/login2.css">
	<link rel="stylesheet" type="text/css" href="static/login1.css">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">

	<title>Signup</title>
</head>





<body style="background-color: #999999;">

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
				<div class="login100-form-title" style="background-image: url(static/img/lg2.jpg);">
					<span class="login100-form-title-1">
						Sign UP
					</span>
				</div>

				<form class="login100-form validate-form" action="backendScript/signup_process.php" method="POST">


					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">First Name</span>
					  	<?php
					  		if ( isset($_GET['first']) ) {
					  			$first = $_GET['first'];
					  			echo '<input class="input100" type="text" name="first" placeholder="First Name..." value='.$first.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="first" placeholder="First Name...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Last Name</span>
					  	<?php
					  		if ( isset($_GET['last']) ) {
					  			$last = $_GET['last'];
					  			echo '<input class="input100" type="text" name="last" placeholder="Last Name..." value='.$last.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="last" placeholder="Last Name...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
					  	<?php
					  		if ( isset($_GET['email']) ) {
					  			$email = $_GET['email'];
					  			echo '<input class="input100" type="text" name="email" placeholder="Email..." value='.$email.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="email" placeholder="Email...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
					  	<?php
					  		if ( isset($_GET['uid']) ) {
					  			$uid = $_GET['uid'];
					  			echo '<input class="input100" type="text" name="uid" placeholder="Username..." value='.$uid.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="uid" placeholder="Username...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="Password" name="pwd" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Address</span>
					  	<?php
					  		if ( isset($_GET['address']) ) {
					  			$address = $_GET['address'];
					  			echo '<input class="input100" type="text" name="address" placeholder="Address..." value='.$address.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="address" placeholder="Address...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Country</span>
					  	<?php
					  		if ( isset($_GET['country']) ) {
					  			$country = $_GET['country'];
					  			echo '<input class="input100" type="text" name="country" placeholder="Country..." value='.$country.'>';
					  		}
					  		else{
					  			echo '<input class="input100" type="text" name="country" placeholder="Country...">';
					  		}
					  	?>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Login
						</a>
					</div>
					<br>
					<br>
					<br>
				<!-- sign up error handlers -->
				<?php
					if ( !isset($_GET['signup']) ) {
						
					}
					else{
						$singupCheck = $_GET['signup'];
						switch ($singupCheck) {
							case 'empty':
								echo "<p style='color:red;'>Please fill in all fields!</p>";
								break;
							case 'invalidemail':
								echo "<p style='color:red;'>Please enter a valide email!</p>";
								break;
							case 'success':
								echo "<p style='color:blue;'>Your account has been created!!</p>";
								break;
						}
					}
				?>

				</form>


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






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	

</body>
</html>