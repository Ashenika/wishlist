<!DOCTYPE html>
<html>
<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: ACER-->
<!--* Date: 12/17/2018-->
<!--* Time: 12:11 PM-->
<!--*/-->

<?php
if(isset($_COOKIE["wishlist_IDS"])) $items_ids = json_decode($_COOKIE["wishlist_IDS"]);
else $items_ids = array();
?>

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
                <li>
                    <div>
                        <h5><?php echo $_SESSION['username']?></h5>
                    </div>
                </li>
                <li class="acountopen">
                    <a href="#" title=""><i class="far fa-user"></i></a>
                    <ul>
                        <li><a href="#" title="">Settings</a></li>
                        <li><a href="<?php echo base_url(); ?>/index.php/AuthController/logout" title="">Logout</a></li>
                    </ul>
                </li>
                <li class="searchopen"><a href="#" title="">
                        <i class="far fa-heart"></i>
                        <span id="cartcount"><?php echo count($this->cart->contents());  ?></span></a></li>
            </ul>
        </div>
    </div>
</header>
<div class="theme-layout">
    <section>
        <div class="block">
            <div data-velocity="-.1" style="background: url(<?php echo base_url(); ?>assets/images/frontcover.jpg) repeat scroll 50% 0px transparent;" class="parallax light layer blackish  scrolly-invisible no-repeat"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php foreach($wishlist as $key=>$value){?>
                            <div class="innerhead">
                                <h2>Get What you WISH</h2>
                                <h2><?php echo $value->wishlist_name;?></h2>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="pactions" style="margin-left: 900px">
                    <a href="<?php echo base_url(); ?>index.php/ItemListController/testWishlist" title="">Add Items to Wishlist</a>
                </div>
                    <div class="grids-sec">
                        <div class="row" id="masonry">
                            <?php foreach($wishlists as $key=>$value){?>
                            <div class="col-lg-5 col-md-4 col-sm-6 col-xs-12 cat2 cat1" style="border: thin;border-style: solid;margin: 20px;">
                                <div class="shop-product list">
                                    <div class="widget">
                                        <h3>Wishlist Name :<?php echo $value->created_wishlist_name;?>
                                            <a class="wbtn" href="<?php echo base_url(); ?>index.php/ItemListController/viewWishlist/<?php echo $value->created_id;?>" title="">View</a>
                                        </h3>
                                        <p>Description :<?php echo $value->wishlist_desc;?></p>
                                        <?php foreach($products as $key=>$value){?>
                                        <div class="post-widget">
                                            <div class="post-sidebar">
                                                <div class="avatar">
                                                    <a href="#" title=""><img src="<?php echo base_url(); ?>assets/<?php echo $value->file_path;?>" alt="" /></a>
                                                </div>
                                                <div class="psd-info">
                                                    <h3><a href="#" title=""><?php echo $value->product_title;?></a></h3>
                                                    <ul class="metas">
                                                        <li><a href="#" title="" style="color: #072540;"><i>QTY</i> <?php echo $value->quantity;?></a></li>
                                                        <li><h5><a href="#" title="">$<?php echo $value->price;?></a></h5></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>
                            <?php }  ?>
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


<script data-cfasync="false" src="<?php echo base_url(); ?>assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/modernizr.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/isotop.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/value.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/slick.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/scrolly.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/backbone/App.js"></script>

<script>
    $('.cartopen').on('click', function () {
        $('.cartslide').addClass('slidein');
        $('body').addClass('active');
    });
    $('.closecartslide').on('click', function () {
        $('.cartslide').removeClass('slidein');
        $('body').removeClass('active');
    });
    $('.delcart').on('click', function () {
        $(this).parent().parent().fadeOut();
    });

    $('.searchopen').on('click', function () {
        $('.searchdialouge').fadeIn('fast');
        $('header').addClass('showup');
    });
    $('.searchpopup > span').on('click', function () {
        $(this).parent().parent().fadeOut('fast');
        $('header').removeClass('showup');
    });
</script>

</body>
</html>

