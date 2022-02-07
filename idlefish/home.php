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


    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">

		
	</script>

	<title>Home</title>
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














    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(static/img/bg1.jpg);">

    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(static/img/car2.jpg);">
                        <div class="catagory-content">
                            <a href="car.php">Cars</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(static/img/clothes.jpg);">
                        <div class="catagory-content">
                            <a href="clothes.php">Clothes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(static/img/Tech.jpg);">
                        <div class="catagory-content">
                            <a href="technology.php">Technology</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay" style="background-image: url(static/img/house4.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>New</h6>
                                <h2>House</h2>
                                <a href="house.php" class="btn essence-btn">Check Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->



    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Popular Trends</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">


                    <!-- ##### Car ##### -->
                    <?php
					$sql2 = "SELECT * FROM products WHERE tag = 'Car' ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($conn, $sql2);
					$result_check = mysqli_num_rows($result);

					if ($result_check > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
				            $title = $row['title'];
				            $price = $row['price'];
				            // $imageName = $row['image_name'];
				            // modified after muti images
				            $images = $row['image_name'];
				            $obj = json_decode($images, true);
				            $imageName = $obj[0];
							echo	'
									<div class="single-product-wrapper">
										<div class="product-img">
										 	<img src="itemImage/'.$imageName.'">
										</div>
										<div class="product-description">
											<span>TOPHOT</span>
											<a href="product.php?id='.$id.'">
												<h6>'.$title.'</h6>
											</a>
											<p class="product-price">$ '.$price.'</p>
										</div>
									</div>';
						}
					}
                    ?>

                    <!-- ##### House ##### -->
                    <?php
					$sql2 = "SELECT * FROM products WHERE tag = 'House' ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($conn, $sql2);
					$result_check = mysqli_num_rows($result);

					if ($result_check > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
				            $title = $row['title'];
				            $price = $row['price'];
				            // $imageName = $row['image_name'];
				            // modified after muti images
				            $images = $row['image_name'];
				            $obj = json_decode($images, true);
				            $imageName = $obj[0];
							echo	'
									<div class="single-product-wrapper">
										<div class="product-img">
										 	<img src="itemImage/'.$imageName.'">
										</div>
										<div class="product-description">
                                            <span>TOPHOT</span>
											<a href="product.php?id='.$id.'">
												<h6>'.$title.'</h6>
											</a>
											<p class="product-price">$ '.$price.'</p>
										</div>
									</div>';
						}
					}
                    ?>

                    <!-- ##### Clothes ##### -->
                    <?php
					$sql2 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($conn, $sql2);
					$result_check = mysqli_num_rows($result);

					if ($result_check > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
				            $title = $row['title'];
				            $price = $row['price'];
				            // $imageName = $row['image_name'];
				            // modified after muti images
				            $images = $row['image_name'];
				            $obj = json_decode($images, true);
				            $imageName = $obj[0];
							echo	'
									<div class="single-product-wrapper">
										<div class="product-img">
										 	<img src="itemImage/'.$imageName.'">
										</div>
										<div class="product-description">
                                            <span>TOPHOT</span>
											<a href="product.php?id='.$id.'">
												<h6>'.$title.'</h6>
											</a>
											<p class="product-price">$ '.$price.'</p>
										</div>
									</div>';
						}
					}
                    ?>

                    <!-- ##### Technology ##### -->
                    <?php
					$sql2 = "SELECT * FROM products WHERE tag = 'Technology' ORDER BY id DESC LIMIT 1";
					$result = mysqli_query($conn, $sql2);
					$result_check = mysqli_num_rows($result);

					if ($result_check > 0){
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
				            $title = $row['title'];
				            $price = $row['price'];
				            // $imageName = $row['image_name'];
				            // modified after muti images
				            $images = $row['image_name'];
				            $obj = json_decode($images, true);
				            $imageName = $obj[0];
							echo	'
									<div class="single-product-wrapper">
										<div class="product-img">
										 	<img src="itemImage/'.$imageName.'">
										</div>
										<div class="product-description">
                                            <span>TOPHOT</span>
											<a href="product.php?id='.$id.'">
												<h6>'.$title.'</h6>
											</a>
											<p class="product-price">$ '.$price.'</p>
										</div>
									</div>';
						}
					}
                    ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->





    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a id = "footer" href="home.php" style="font-size: 20px" >Idlefish</a>
                        </div>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <!--<li><a href="blog.html">Category</a></li>-->
                                <li><a href="about.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <!--Single Widget Area-->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="about.php">Contact</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="car.php">Cars</a></li>
                            <li><a href="house.php">Houses</a></li>
                            <li><a href="clothes.php">Clothes</a></li>
                            <li><a href="technology.php">Technology</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved with Idlefish

                    </p>
                </div>
            </div>

        </div>
    </footer>











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




	

</body>
</html>