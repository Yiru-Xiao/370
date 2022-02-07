
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

   <!-- Bootstrap core CSS -->
   <link href="static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">

	<title>Clothes</title>
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






    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(static/iimg/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Clothes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a href="#">Sort by Featured</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="clothes.php?sort=timeOld">Time - Old to New</a></li>
                                            <li><a href="clothes.php?sort=timeNew">Time - New to Old</a></li>
                                            <li><a href="clothes.php?sort=priceLow">Price - Low to High</a></li>                   
                                            <li><a href="clothes.php?sort=priceHigh">Price - High to Low</a></li>
                                        </ul>
                                    </li>
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">Location</a>
                                        <ul class="sub-menu collapse" id="shoes">
                                            <li><a href="clothes.php">All</a></li>
                                            <li><a href="clothes.php?sort=Saskatoon">Saskatoon</a></li>
                                            <li><a href="clothes.php?sort=Regina">Regina</a></li>
                                            <li><a href="clothes.php?sort=Calgary">Calgary</a></li>
                                            <li><a href="clothes.php?sort=Vancouver">Vancouver</a></li>
                                        </ul>
                                    </li>
                                   <li data-toggle="collapse" data-target="#sa" class="collapsed">
                                        <a href="#">Price</a>
                                        <ul class="sub-menu collapse" id="sa">
                                            <li><a href="clothes.php">All</a></li>
                                            <li><a href="clothes.php?sort=price10">$10-$49</a></li>
                                            <li><a href="clothes.php?sort=price50">$50-$99</a></li>
                                            <li><a href="clothes.php?sort=price100">$100-$149</a></li>
                                            <li><a href="clothes.php?sort=price150">$150-$199</a></li>
                                            <li><a href="clothes.php?sort=price200">$200 and more</a></li>
                                        </ul>
                                    </li>
           
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
						                <?php
						                $sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ";
										$result = mysqli_query($conn, $sql1);
										$result_check = mysqli_num_rows($result);
						                echo '<p><span>'.$result_check.'</span> products found</p>';
						                ?>                                    	
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">

						<!------------------ display items --------------->

						<?php
							/***************** check which page to display *****************/
							$result_per_page = 12;
							if (! isset($_GET['page'])) {
								$page = 1;
							}
							else{
								$page = $_GET['page'];
							}
							$this_page_first_result = ($page - 1) * $result_per_page;

							/***************** car items ***************/
							if (isset($_GET['sort'])) {
								$sortCheck = $_GET['sort'];
								switch ($sortCheck) {
									// All listsing sort
									case 'timeOld':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY id LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'timeNew':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY id DESC LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'priceHigh':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY price DESC LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'priceLow':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									// any price sort
									case 'price10':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND price >= 10 AND price <= 49 ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'price50':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND price >= 50 AND price <= 99 ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'price100':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND price >= 100 AND price <= 149 ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'price150':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND price >= 150 AND price <= 199 ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'price200':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND price >= 200 ORDER BY price LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									// Location
									case 'Saskatoon':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Saskatoon%'  ORDER BY id LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'Regina':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Regina%'  ORDER BY id LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'Calgary':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Calgary%'  ORDER BY id LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
									case 'Vancouver':
										$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Vancouver%'  ORDER BY id LIMIT ".$this_page_first_result.",".$result_per_page;
										break;
								}
							}

							else{
								$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' LIMIT ".$this_page_first_result.",".$result_per_page;

							}
							$result = mysqli_query($conn, $sql1);
							$result_check = mysqli_num_rows($result);
							if ($result_check > 0){
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
						            $title = $row['title'];
						            $price = $row['price'];
						            $description = $row['description'];
						            // $imageName = $row['image_name'];
						            // modified after muti images
						            $images = $row['image_name'];
						            $obj = json_decode($images, true);
						            $imageName = $obj[0];
						            $imageName2 = $obj[1];
                                    
                                    // if login
                                    if (isset($_SESSION['id'])) {
                                        $user_id = $_SESSION['id'];
                                        $sql2 = "SELECT * FROM favorites WHERE userId='$user_id' AND productId = $id;";
                                        $result2 = mysqli_query($conn, $sql2);
                                        $result_check2 = mysqli_num_rows($result2);

                                        if ($result_check2 > 0){
                                            echo'
                                        <div class="col-6 col-sm-4 col-lg-3">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    <img src="itemImage/'.$imageName.'" alt="">
                                                    <!-- Hover Thumb -->
                                                    <img class="hover-img" src="itemImage/'.$imageName2.'" alt="">
                                                </div>

                                                <!-- Product Description -->
                                                <div class="product-description">
                                                    <span>FAVORITE<span>
                                                    <span>
                                                    <form action="backendScript/removeFavorites_process.php" method="POST">
                                                        <input type="hidden" name="product_id" value="'.$id.'">
                                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <button type="submit" name = "submitFavorite" style="border: 0"> <i class="fas fa-heart" style="color: red"></i></button>
                                                    </form>
                                                    </span>


                                                    <a href="product.php?id='.$id.'">
                                                        <h6>'.$title.'</h6>
                                                    </a>
                                                    <p class="product-price">$ '.$price.'</p>

                                                </div>
                                            </div>
                                        </div>';


                                        }

                                        else{
                                            echo'
                                        <div class="col-6 col-sm-4 col-lg-3">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    <img src="itemImage/'.$imageName.'" alt="">
                                                    <!-- Hover Thumb -->
                                                    <img class="hover-img" src="itemImage/'.$imageName2.'" alt="">
                                                </div>

                                                <!-- Product Description -->
                                                <div class="product-description">
                                                    <span>TOPHOT<span>
                                                    <span>
                                                    <form action="backendScript/addFavorites_process.php" method="POST">
                                                        <input type="hidden" name="product_id" value="'.$id.'">
                                                        <input type="hidden" name="user_id" value="'.$user_id.'">
                                                        <button type="submit" name = "submitFavorite" style="border: 0"> <i class="far fa-heart" style="color: red"></i></button>
                                                    </form>
                                                    </span>


                                                    <a href="product.php?id='.$id.'">
                                                        <h6>'.$title.'</h6>
                                                    </a>
                                                    <p class="product-price">$ '.$price.'</p>

                                                </div>
                                            </div>
                                        </div>';
                                        }

                                    }
                                    else{
                                            echo'
                                        <div class="col-6 col-sm-4 col-lg-3">
                                            <div class="single-product-wrapper">
                                                <!-- Product Image -->
                                                <div class="product-img">
                                                    <img src="itemImage/'.$imageName.'" alt="">
                                                    <!-- Hover Thumb -->
                                                    <img class="hover-img" src="itemImage/'.$imageName2.'" alt="">
                                                </div>

                                                <!-- Product Description -->
                                                <div class="product-description">
                                                    <span>TOPHOT<span>
                                                    <span>
                                                    </span>

                                                    <a href="product.php?id='.$id.'">
                                                        <h6>'.$title.'</h6>
                                                    </a>
                                                    <p class="product-price">$ '.$price.'</p>

                                                </div>
                                            </div>
                                        </div>';

                                    }

                                    


                }
            }

        ?>
                    </div>
                </div>






	            <!-- Pagination -->
	            <nav aria-label="navigation">
	                <ul class="pagination mt-50 mb-70">
				  	<?php
				  		/********* Check total product numbers *********/
						if (isset($_GET['sort'])) {
							$sortCheck = $_GET['sort'];
							switch ($sortCheck) {
								// all listsings
								case 'timeOld':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY id;";
									break;
								case 'timeNew':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY id DESC;";
									break;
								case 'priceHigh':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY price DESC;";
									break;
								case 'priceLow':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' ORDER BY price;";
									break;
								// any price
								case 'price10':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'AND price >= 10 AND price <= 49 ORDER BY price;";
									break;
								case 'price50':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'AND price >= 50 AND price <= 99 ORDER BY price;";
									break;
								case 'price100':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'AND price >= 100 AND price <= 149 ORDER BY price;";
									break;
								case 'price150':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'AND price >= 150 AND price <= 199 ORDER BY price;";
									break;
								case 'price200':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'AND price >= 200 ORDER BY price;";
									break;
								// Location
								case 'Saskatoon':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Saskatoon%' ORDER BY id;";
									break;
								case 'Regina':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Regina%' ORDER BY id;";
									break;
								case 'Calgary':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Calgary%' ORDER BY id;";
									break;
								case 'Vancouver':
									$sql1 = "SELECT * FROM products WHERE tag = 'Clothes' AND address LIKE '%Vancouver%' ORDER BY id;";
									break;						
							}
						}
						else{
							$sql1 = "SELECT * FROM products WHERE tag = 'Clothes'";
						}
						$result = mysqli_query($conn, $sql1);
						$result_check = mysqli_num_rows($result);
						$number_of_pages = ceil($result_check / $result_per_page);


						/*************** display pagination accorting to the sort way ***************/
						// if there is a sort way
						if ( isset($_GET['sort']) ) {
							$sort = $_GET['sort'];

							// get current page
							if (! isset($_GET['page'])) {
								$current_page = 1;
							}
							else{
								$current_page = $_GET['page'];
							}

							// if page is not first page
					  		if ( isset($_GET['page']) && $_GET['page'] > 1) {
					  			$previous_page = $_GET['page']-1;
					  			echo '<li class="page-item"><a class="page-link" href="clothes.php?sort='.$sort.'&page='.$previous_page.'"><i class="fa fa-angle-left"></i></a></li>';
					  		}

					  		// echo out every page
					  		for ($i=1; $i <= $number_of_pages; $i++) {
					  			if ($i == $current_page) {
					  				echo '<li class="page-item"><a class="page-link" href="clothes.php?sort='.$sort.'&page='.$i.'" style="color: blue;">'.$i.'</a></li>';
					  			}
					  			else{
					  				echo '<li class="page-item"><a class="page-link" href="clothes.php?sort='.$sort.'&page='.$i.'">'.$i.'</a></li>';
					  			}
					  		}

					  		// if page is not last page
					  		if (isset($_GET['page']) && $_GET['page'] < $number_of_pages) {
					  			$next_page = $_GET['page']+1;
					  			echo '<li class="page-item"><a class="page-link" href="clothes.php?sort='.$sort.'&page='.$next_page.'"><i class="fa fa-angle-right"></i></a></li>';
					  		}



						}
						// if there is no a sort way
						else{

							// get current page
							if (! isset($_GET['page'])) {
								$current_page = 1;
							}
							else{
								$current_page = $_GET['page'];
							}

							// if page is not first page
					  		if (isset($_GET['page']) && $_GET['page'] > 1) {
					  			$previous_page = $_GET['page']-1;
					  			echo '<li class="page-item"><a class="page-link" href="clothes.php?page='.$previous_page.'"><i class="fa fa-angle-left"></i></a></li>';
					  		}

					  		// echo out every page
					  		for ($i=1; $i <= $number_of_pages; $i++) { 
					  			if ($i == $current_page) {
					  				echo '<li class="page-item"><a class="page-link" href="clothes.php?page='.$i.'" style="color: blue;">'.$i.'</a></li>';	
					  			}
					  			else{
					  				echo '<li class="page-item"><a class="page-link" href="clothes.php?page='.$i.'">'.$i.'</a></li>';
					  			}
					  		}

					  		// if page is not last page
					  		if (isset($_GET['page']) && $_GET['page'] < $number_of_pages) {
					  			$next_page = $_GET['page']+1;
					  			echo '<li class="page-item"><a class="page-link" href="clothes.php?page='.$next_page.'"><i class="fa fa-angle-right"></i></a></li>';
					  		}

				  		}

				  	?>

	                </ul>
	            </nav>





        	</div>
        </div>
    </section>
 



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





  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



	


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