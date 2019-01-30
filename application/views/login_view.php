<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 12/17/2018
 * Time: 1:42 PM
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
<style>
    .alert {
        padding: 20px;
        background-color: darkseagreen;
        color: white;
    }

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>

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
                                <h3>Login</h3>
                                <form role="form" action="<?php echo base_url();?>index.php/AuthController/login" method="post">
                                    <div class="inputfield">
                                        <label>Username or email address *</label>
                                        <input type="text" name="email" id="lgn-username" />
                                    </div>
                                    <div class="inputfield">
                                        <label>Password *</label>
                                        <input type="password" name="password" id="lgn-password"/>
                                    </div>
                                    <p>
                                        <input class="styled-checkbox" id="1" value="value1" type="checkbox">
                                        <label for="1">Save Password</label>
                                    </p>
                                    <a href="#" title="">Foget your Password</a>
                                    <button type="submit" id="login-btn">Sign In</button>
                                    <h5><a href="<?php echo base_url(); ?>index.php/AuthController/register" title="">OR Register</a></h5>
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
<script type="text/template" id="logged_template">
    <label style="margin-right: 24px;margin-top: 4px;"><span style="color:white">Hi <span> <a style="color:white" href="#"><span id="loginName"></span></a> </label>
    <a id="logout-btn" href="#" style="color:white">Logout</a>
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
<script src="<?php echo base_url();?>assets/js/backbone/views/login.js"></script>

</body>
</html>

