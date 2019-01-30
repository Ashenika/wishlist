<!DOCTYPE html>
<html>
<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: ACER-->
<!--* Date: 12/17/2018-->
<!--* Time: 12:11 PM-->
<!--*/-->
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

    <header>
        <div class="container fluid">
            <div class="logo">
                <a href="#" title="">Wishlist</a>
            </div>
            <div class="action-btns">
                <ul>
                    <li class="acountopen">
                        <a href="<?php echo base_url(); ?>/index.php/ItemListController/loginView" title="">Name <i class="far fa-user"></i></a>
                        <ul>
                            <li><a href="#" title="">Settings</a></li>
                            <li><a href="<?php echo base_url(); ?>/index.php/AuthController/logout" title="">Logout</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url(); ?>/index.php/ItemListController/viewWishlist" title=""><i class="far fa-heart"></i><span id="cartcount"><?php echo count($this->cart->contents());  ?></span></a></li>
                </ul>
            </div>
        </div>
    </header>


</body>
</html>

