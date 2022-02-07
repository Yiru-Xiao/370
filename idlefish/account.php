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



    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="static/css/core-style.css">
    <link rel="stylesheet" href="static/style.css">

	<title>Account</title>
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



<!-----------------------------------  Account Info --------------------------------->
<?php
	// if use log in
	if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $sql1 = "SELECT * FROM users WHERE user_id = '$id';";
        $result = mysqli_query($conn, $sql1);

        /****************** using while loop to display *******************/
        while ($row = mysqli_fetch_assoc($result)) {
            $first = $row['user_first'];
            $last = $row['user_last'];
            $email = $row['user_email'];
            $uid = $row['user_uid'];
            $address = $row['user_address'];
            $country = $row['user_country'];

            $sql2 = "SELECT * FROM profileimg WHERE userid = '$id';";
            $resultImg = mysqli_query($conn, $sql2);
            foreach ($resultImg as $rowImg) {
                $nameImg = $rowImg['name'];
            }

            echo
                '<img class="rounded-circle account-img mx-auto d-block mr-4" src="profileImage/'.$nameImg.'" style=" height: 125px;  width: auto; margin-top: 16px;";>
        
                <div class="container mt-4">
                    <form action="backendScript/updateAccount_process.php" method="POST" enctype="multipart/form-data">
                        <fieldset class="form-group">
               
                        
                          <div class="form-group mt-4">
                            <label>
                            &nbsp<i class="fa fa-user"></i> First Name
                            </label>
                            <input type="text" class= "form-control" name="first" placeholder="Firstname" value='.$first.'>
                          </div>

                          <div class="form-group">
                            <label>&nbsp<i class="fa fa-user"></i> Last Name</label>
                            <input type="text" class= "form-control" name="last" placeholder="Lastname" value='.$last.'>
                          </div>

                          <div class="form-group">
                            <label>&nbsp<i class="fa fa-envelope-o"></i> Email</label>
                            <input type="email" class= "form-control" name="email" placeholder="Email" value='.$email.'>
                          </div>

                          <div class="form-group">
                            <label>&nbsp<i class="fa fa-user"></i> Username</label>
                            <input type="text" class= "form-control" name="uid" placeholder="Username" value='.$uid.'>
                          </div>


                          <div class="form-group">
                            <label>&nbsp<i class="fa fa-street-view"></i> Address</label>
                            <textarea class="form-control" name="address" rows="1"  placeholder="Address">'.$address.'</textarea>
                          </div>


                          <div class="form-group">
                            <label>&nbsp<i class="fa fa-sticky-note-o"></i> Country</label>
                            <input type="text" class= "form-control" name="country" placeholder="Country" value='.$country.'>
                          </div>


                          <span>Upload User Profile Image</span>
                          <input type="file" name="myfile">
                          <br><br>
                          <button type="submit" name = "submit" class="btn btn-primary">Update</button>
                    </form>

                </div>';



        }

	}
?>
    <!-- login error handlers -->
    <div class="container">
    <?php
        if ( !isset($_GET['update']) ) {
        }
        else{
            $updateCheck = $_GET['update'];
            switch ($updateCheck) {
                case 'empty':
                    echo "<p style='color:red;'>Please fill in all fields!</p>";
                    break;
                case 'invalidemail':
                    echo "<p style='color:red;'>Please enter a valide email!</p>";
                    break;
                case 'incorrectFileType':
                    echo "<p style='color:red;'>This file type is not allowed!</p>";
                    break;
                case 'errorFile':
                    echo "<p style='color:red;'>There was an error for uploading file!</p>";
                    break;
                case 'bigFile':
                    echo "<p style='color:red;'>File is too big!</p>";
                    break;
                case 'success':
                    echo "<p style='color:blue;'>Your account has been updated!!</p>";
                    break;
            }
        }
        ?>
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