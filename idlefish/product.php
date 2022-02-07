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

    <script src="https://use.fontawesome.com/releases/v5.10.1/js/all.js"></script>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">


    

    <script>
        var commentBox = () => {
          var x = document.getElementById("comment_box");
          var y = document.getElementById("comment_box_check");
          if (x.style.display === "none") {
            x.style.display = "block";
            y.innerHTML = "Close Comment";
          } else {
            x.style.display = "none";
            y.innerHTML = "Add a New Comment";
          }
        }
    </script>

  <title>Product</title>
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






<!-----------------------------------  product info --------------------------------->

<?php
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM products WHERE id='$id';";
    $result = mysqli_query($conn, $sql1);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $pirce = $row['price'];

            // $imageName = $row['image_name'];
            $images = $row['image_name'];
            $obj = json_decode($images, true);
            $imageName = $obj[0];
            

            $description = $row['description'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];


            echo'
              <section class="single_product_details_area d-flex align-items-center">
                  <div class="single_product_thumb clearfix">
                      <div class="product_thumbnail_slides owl-carousel">';  
                        foreach($obj as $imageName){
                            echo'
                            <img src="itemImage/'.$imageName.'">';
                        }
                            echo'
                      </div>
                  </div>';


                            echo '
                  <div class="single_product_desc clearfix">
                      <span>tophot</span>
                      <a href="#">
                          <h2>'.$title.'</h2>
                      </a>

                      <p class="product-price">$ '.$pirce.'</p>
                      <p class="product-desc">Phone: '.$phone.'</p>
                      <p class="product-desc">Email: '.$email.'</p>
                      <p class="product-desc">City: '.$address.'</p>
                      <br>
                      <p class="product-desc">'.$description.'</p>';


                    // if login
                    if (isset($_SESSION['id'])) {
                        $user_id = $_SESSION['id'];
                        $sql2 = "SELECT * FROM favorites WHERE userId='$user_id' AND productId = $id;";
                        $result2 = mysqli_query($conn, $sql2);
                        $result_check2 = mysqli_num_rows($result2);

                        if ($result_check2 > 0){

		                    echo'
		                      <form class="cart-form clearfix" action="backendScript/removeFavorites_process.php" method="POST">
		                          <input type="hidden" name="product_id" value="'.$id.'">
		                          <input type="hidden" name="user_id" value="'.$user_id.'">
		                          <div class="cart-fav-box d-flex align-items-center">
		                              <!-- Cart -->

		                              <button type="submit" name = "submitFavorite" value="5" class="btn essence-btn">Remove from wishlist</button>
		                          </div>
		                      </form>';
	                  	}
	                  	else{

		                    echo'
		                      <form class="cart-form clearfix" action="backendScript/addFavorites_process.php" method="POST">
		                          <input type="hidden" name="product_id" value="'.$id.'">
		                          <input type="hidden" name="user_id" value="'.$user_id.'">
		                          <div class="cart-fav-box d-flex align-items-center">
		                              <!-- Cart -->

		                              <button type="submit" name = "submitFavorite" value="5" class="btn essence-btn">Add to wishlist</button>
		                          </div>
		                      </form>';

	                  	}
	                }
	                else{

		                    echo'';
	                }

                    echo'
                  </div>



                  <!----------- display comments ---------->
                  <div class="col-md-12 mt-4">
                    <h5>Comments</h5>';
                    $product_id = $_GET['id'];
                    $sql = "SELECT * FROM comments WHERE productId='$product_id';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $row) {
                            $content = $row['content'];
                            $user_id = $row['userId'];

                            $sql2 = "SELECT * FROM users WHERE user_id='$user_id';";
                            $result2 = mysqli_query($conn, $sql2);
                          if (mysqli_num_rows($result2) > 0) {
                              foreach ($result2 as $row2) {
                                $user_name = $row2['user_uid'];
                              echo'
                              <div class="card mb-4">
                                <div class="card-body">
                                  <span class="text-muted">'.$user_name.': </span>
                                  <span class="comment_content">'.$content.'</span>
                                </div>
                              </div>
                              ';

                              }
                            }
                        }
                    }
                    else{
                        echo '
                              <div class="card mb-4">
                                <div class="card-body">
                                  <span class="text-muted"></span>
                                  <span class="comment_content">Nobody leave a comment yet</span>
                                </div>
                              </div>
                        ';
                    }
                    echo'
                  </div>';


                  // add new comments
                  if ( isset($_SESSION['id']) ) {
                      $user_id = $_SESSION['id'];
                      echo '
                        <div class="col-md-12 product-info">
                          <button type="button" class="btn btn-outline-primary" id="comment_box_check" onclick="commentBox()">Add a New Comment</button>
                        </div>
    
                        <div class="col-md-12 product-info">
                          <form id="comment_box" action="backendScript/comment_process.php" method="POST" style="display: none";>
                            <input type="hidden" name="product_id" value="'.$product_id.'">
                            <input type="hidden" name="user_id" value="'.$user_id.'">
                            <div class="form-group">
                              <textarea class="form-control" name="content" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submitComment">Submit</button>
                          </form>
                        </div>';
                    }

            echo' 
              </section>
            ';



        }

    }
?>




















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