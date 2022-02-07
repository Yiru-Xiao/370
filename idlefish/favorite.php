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

    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">




	<title>Sell Item</title>
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


    <br>





<!---------------------------------- exsiting items ------------------------------->
<?php
    $id = $_SESSION['id'];

    $sql2 = "SELECT * FROM favorites WHERE userId='$id';";
    $result2 = mysqli_query($conn, $sql2);
    $result_check2 = mysqli_num_rows($result2);

    if ($result_check2 > 0){
        echo '
        <div class="px-4 px-lg-0">
            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">



                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

        ';

        while ($row2 = mysqli_fetch_assoc($result2)) {
            $product_id = $row2['productId'];

            $sql1 = "SELECT * FROM products WHERE id ='$product_id';";
            $result = mysqli_query($conn, $sql1);
            $result_check = mysqli_num_rows($result);

            if ($result_check > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $tag = $row['tag'];

                    // $imageName = $row['image_name'];
                    // modified after muti images
                    $images = $row['image_name'];
                    $obj = json_decode($images, true);
                    $imageName = $obj[0];
                    $imageName2 = $obj[1];
                    $user_id = $_SESSION['id'];

                        echo'
                                    <tr>
                                        <th scope="row">
                                            <div class="p-2">
                                                <img src="itemImage/'.$imageName.'" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"><a href="product.php?id='.$id.'" class="text-dark d-inline-block">'.$title.'</a></h5><span class="text-muted font-weight-normal font-italic">Category: '.$tag.'</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="align-middle"><strong>$ '.$price.'</strong></td>


                                        <td class="align-middle">
                                                <form action="backendScript/removeFavorites_process.php" method="POST">
                                                    <input type="hidden" name="product_id" value="'.$id.'">
                                                    <input type="hidden" name="user_id" value="'.$user_id.'">
                                                    <button type="submit" name = "submitFavorite" style="border: 0"> <i class="fa fa-trash"></i></button>
                                                </form>
                                        </td>
                                    </tr>
                        ';
                }
        }
    }

       echo '
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        ';




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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	

</body>
</html>