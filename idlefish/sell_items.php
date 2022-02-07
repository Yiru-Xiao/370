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
    $sql1 = "SELECT * FROM products WHERE userid='$id';";
    $result = mysqli_query($conn, $sql1);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0){
        echo "<div class='container mt-4'>
                <h3>Items You're selling</h3>
                <div class='row'>";

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];

            // $imageName = $row['image_name'];
            // modified after muti images
            $images = $row['image_name'];
            $obj = json_decode($images, true);
            $imageName = $obj[0];
            $imageName2 = $obj[1];

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
                                <span>favorite</span>
                                <span ><a href="#" class="favme fa fa-heart"></a></span>
                                <a href="product.php?id='.$id.'">
                                    <h6>'.$title.'</h6>
                                </a>
                                <p class="product-price">$ '.$price.'</p>

                            </div>
                        </div>
                    </div>';
        }
        echo "  </div>
              </div>";


    }
?>


<!---------------------------------- Upload item ------------------------------->
<div class="container mt-4">
    <form action="backendScript/sellItems_process.php" method="POST" enctype="multipart/form-data">
      <h3>Upload New Item</h3>
      <div class="form-group">
        <label> 
          &nbsp<i class="fab fa-tumblr"></i> Title
        </label>
        <?php
            if ( isset($_GET['title']) ) {
                $title = $_GET['title'];
                echo '<textarea class="form-control" name="title" rows="1">'.$title.'</textarea>';
            }
            else{
                echo '<textarea class="form-control" name="title" rows="1"></textarea>';
            }
        ?>
      </div>


      <div class="form-group">
        <label> 
        &nbsp<i class="fas fa-dollar-sign"></i> Price
        </label>
        <?php
            if ( isset($_GET['price']) ) {
                $price = $_GET['price'];
                echo '<input type="text" class= "form-control" name="price" value='.$price.'>';
            }
            else{
                echo '<input type="text" class= "form-control" name="price">';
            }
        ?>
      </div>

      <div class="form-group">
        <label> 
          &nbsp<i class="fas fa-phone"></i> Phone
        </label>
        <?php
            if ( isset($_GET['phone']) ) {
                $phone = $_GET['phone'];
                echo '<input type="phone" class= "form-control" name="phone" value='.$phone.'>';
            }
            else{
                echo '<input type="phone" class= "form-control" name="phone">';
            }
        ?>
      </div>


      <div class="form-group">
        <label> 
          &nbsp<i class="far fa-envelope"></i> Email
        </label>
        <?php
            if ( isset($_GET['email']) ) {
                $email = $_GET['email'];
                echo '<input type="email" class= "form-control" name="email" value='.$email.'>';
            }
            else{
                echo '<input type="email" class= "form-control" name="email">';
            }
        ?>
      </div>


      <div class="form-group">
      <label>
        &nbsp<i class="fa fa-street-view"></i> Address
      </label>
        <?php
            if ( isset($_GET['address']) ) {
                $address = $_GET['address'];
                echo '<textarea class="form-control" name="address" rows="1">'.$address.'</textarea>';
            }
            else{
                echo '<textarea class="form-control" name="address" rows="1"></textarea>';
            }
        ?>
      </div>

      <div class="form-group">
      <label>
        &nbsp<i class="far fa-file-alt"></i> Description
      </label>
        <?php
            if ( isset($_GET['description']) ) {
                $description = $_GET['description'];
                echo '<textarea class="form-control" name="description" rows="3">'.$description.'</textarea>';
            }
            else{
                echo '<textarea class="form-control" name="description" rows="3"></textarea>';
            }
        ?>
      </div>


    <label>
      &nbsp<i class="fas fa-tags"></i> Tag
    </label>
      <div class="form-group">
        <select class="form-control" name="tag">
          <option>Car</option>
          <option>House</option>
          <option>Clothes</option>
          <option>Technology</option>
        </select>
      </div>



<!--       <input type="file" name="myfile">
      <br><br>
      <button type="submit" name="submit" class="btn btn-primary">Upload item</button> -->
      
      <!-- modified after muti images -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

      <br><br><br>

      <label>
        &nbsp<i class="fas fa-photo-video"></i> Images
      </label>
      <br>
      <input type="file" name="myfile[]" multiple id="gallery-photo-add" ondrop ="imagesPrew(event)" >
      <div class="gallery"></div>

      <br>
      <button type="submit" name="submit" class="btn btn-primary">Upload item</button>


    </form>

    <!-- modified after muti images -->
    <script>
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img width="120px" height="120px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

        };

    $('#gallery-photo-add').on('change', function() {
    imagesPreview(this, 'div.gallery');
    });
    });
    </script>





    <!-- sell item error handlers -->
    <?php
        if ( !isset($_GET['upload']) ) {
            
        }
        else{
            $uploadCheck = $_GET['upload'];
            switch ($uploadCheck) {
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
                case 'notNumber':
                    echo "<p style='color:red;'>Please enter a number for price and phone</p>";
                    break;
                case 'less2':
                    echo "<p style='color:red;'>Please upload more than 1 images</p>";
                    break;
                case 'success':
                    echo "<p style='color:blue;'>Your item has been uploaded!!</p>";
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