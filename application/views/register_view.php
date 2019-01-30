<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 12/17/2018
 * Time: 1:54 PM
 */
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WISHLIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="themenum">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/colors/colors.css" />
    <link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">

</head>
<body>
<div class="theme-layout">

    <section>
        <div class="block">
            <div data-velocity="-.1" style="background: url(<?php echo base_url(); ?>assets/images/frontcover.jpg) repeat scroll 50% 0px transparent;" class="parallax light layer blackish  scrolly-invisible no-repeat"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="innerhead">
                            <h2>WISHLIST - a portal to Get What you WISH</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="acountsec">
                            <h3>Register</h3>
                            <form role="form" action="<?php echo base_url(); ?>index.php/AuthController/registerUser" method="post">
                                <div class="inputfield">
                                    <label>Name*</label>
                                    <input type="text" name="name"/>
                                </div>
                                <div class="inputfield">
                                    <label>Email Address*</label>
                                    <input type="text" name="email" />
                                </div>
                                <div class="inputfield">
                                    <label>Username*</label>
                                    <input type="text" name="username" />
                                </div>
                                <div class="inputfield">
                                    <label>Wishlist Name</label>
                                    <input type="text" name="wishlistName" />
                                </div>
                                <div class="inputfield">
                                    <label>Wishlist Description</label>
                                    <input type="text" name="wishlistDesc" />
                                </div>
                                <div class="inputfield">
                                    <label>Password *</label>
                                    <input type="password" name="password" />
                                </div>
                                <div class="inputfield">
                                    <label>Confirm Password *</label>
                                    <input type="password" name="cpassword"/>
                                </div>
                                <button type="submit">register</button>
                                <h5><a href="<?php echo base_url(); ?>index.php/AuthController/loginView" title="">OR LOGIN</a></h5>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="bottomline">
            <div class="container">
                <span>© 2017 Wishlist. All rights reserved!. Powered by Wishes</span>
            </div>
        </div>
    </footer>
</div>

</body>
</html>

