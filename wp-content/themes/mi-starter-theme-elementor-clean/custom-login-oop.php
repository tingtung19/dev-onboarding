<?php 
/**
 *  Template Name: Custom Login Page With OOP */

 require 'includes\customlogin\class-login.php';

 global $user_ID;
 global $wpdb;

 if (!$user_ID) {
    // # User in logged out

    if(isset($_POST['btn_submit'])){
        $login = new customLogin;  
        # If button login on click
        $username=$wpdb->escape($_POST['username']);
        $password=$wpdb->escape($_POST['password']);      
        $login->getData($username, $password);
    }

        
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="text-center"> 
    <div class="row ">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card" style="width: 20rem;">
                <img src="<?php echo THEME_URL; ?>/assets/images/logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Custom Login With OOP!</h5>
                    <p class="card-text">Please sign here!</p>
                    <form method="post" class="form">
                        <p>
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                        </p>
                        <p>
                            <!-- <label for="password">Password</label> -->
                            <input type="text"  class="form-control" id="password" name="password" placeholder="Enter Password">
                        </p>
                        <p>
                            <label for="username"></label>
                            <button type="submit" class="btn btn-lg btn-primary btn-block" id="btn_submit" name="btn_submit">Log in</button>
                        </p>
                    </form>
                    
                </div>
            </div>
        </div>
            

    </div>   
        
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
   
    <?php
    // get_footer();
 }else{
    //users is logged in
    echo "Anda Sudah Login, silakan logout disini ";
    echo "<a href='".site_url()."/wp-login.php?action=logout&_wpnonce=620a23b10d'><button class='buttton'>Sign Out</button></a>";
 }
?>

