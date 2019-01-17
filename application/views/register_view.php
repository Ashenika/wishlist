<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 12/17/2018
 * Time: 1:54 PM
 */
?>


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
    <title>Kossy | Minimal Ecommerce HTML Template</title>
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
    <link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
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
                            <form role="form" action="<?php echo base_url(); ?>/index.php/AuthController/registerUser" method="post">
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
                                    <label>Password *</label>
                                    <input type="password" name="password" />
                                </div>
                                <div class="inputfield">
                                    <label>Confirm Password *</label>
                                    <input type="password" name="cpassword"/>
                                </div>
                                <button type="submit">register</button>
                                <h5><a href="<?php echo base_url(); ?>/index.php/AuthController/loginView" title="">OR LOGIN</a></h5>
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
<div class="quickviewpopup">
    <div class="quickview">
        <span class="closeview"><i class="la la-close"></i></span>
        <ul class="qv-slider">
            <li><img src="images/resource/qvs1.jpg" alt="" /></li>
            <li><img src="images/resource/qvs2.jpg" alt="" /></li>
        </ul>
        <div class="pinfo">
            <h3><a href="" title="">Knot Stripped Dress</a></h3>
            <span>$59.99</span>
            <div class="previews">
                <span>Review</span>
                <div class="rating">
                    <b class="la la-star"></b>
                    <b class="la la-star"></b>
                    <b class="la la-star"></b>
                    <b class="la la-star"></b>
                    <b class="la la-star-o"></b>
                </div>
            </div>
            <div class="pavail">
                <span>Availability</span>
                <p>In stock</p>
            </div>
            <div class="pactions">
                <div class="quantity">
                    <span><input id="box4" type="text" class="manual-adjust" value="0" /></span>
                </div>
                <a href="#" title="">add to card</a>
                <a class="wbtn" href="#" title=""><i class="la la-heart"></i></a>
            </div>
            <div class="pmetas">
                <p><strong>SKU:</strong> DR-055</p>
                <p><strong>Categories: </strong> Dress</p>
            </div>
            <div class="ptags">
                <span>Tags:</span><a href="#" title="">Women</a>, <a href="#" title="">Dress</a>, <a href="#" title="">Fashion</a>
            </div>
            <div class="social">
                <span>Social share:</span>
                <a href="#" title=""><i class="la ti-facebook"></i></a>
                <a href="#" title=""><i class="la ti-pinterest"></i></a>
                <a href="#" title=""><i class="la ti-twitter"></i></a>
                <a href="#" title=""><i class="la ti-google"></i></a>
                <a href="#" title=""><i class="la ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="searchdialouge">
    <div class="searchpopup">
        <h3>Search</h3><span><i class="ti-close"></i></span>
        <form>
            <input type="text" placeholder="Search here" />
            <button type="submit"><i class="la la-search"></i></button>
        </form>
    </div>
</div>
<div class="cartslide">
    <span class="closecartslide"><i class="ti-close"></i></span>
    <div class="cartslidesec">
        <h3>Your Cart</h3>
        <ul>
            <li>
                <div class="cartlist">
                    <span class="delcart"><i class="la ti-close"></i></span>
                    <div class="cartlistthumb"> <a href="#" title=""><img src="images/resource/cl1.jpg" alt="" /></a> </div>
                    <div class="cartlistinfo"> <h3><a href="#" title="">Pink T-shirt</a></h3><span>$29.99</span> </div>
                </div>
            </li>
            <li>
                <div class="cartlist">
                    <span class="delcart"><i class="la ti-close"></i></span>
                    <div class="cartlistthumb"> <a href="#" title=""><img src="images/resource/cl2.jpg" alt="" /></a> </div>
                    <div class="cartlistinfo"> <h3><a href="#" title="">Red Bracelet</a></h3><span>$12.99</span> </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="cartinfos">
        <span>Subtotal</span><strong>$42.99</strong>
        <a href="#" title="">Edit Cart</a>
        <a href="#" title="">Checkout</a>
    </div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/modernizr.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/wow.min.js" type="text/javascript"></script>
<script src="js/isotop.js" type="text/javascript"></script>
<script src="js/value.js" type="text/javascript"></script>
<script src="js/slick.min.js" type="text/javascript"></script>
<script src="js/scrolly.js" type="text/javascript"></script>
</body>
</html>

