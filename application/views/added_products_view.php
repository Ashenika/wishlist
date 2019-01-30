<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 1/29/2019
 * Time: 10:30 AM
 */
?>


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

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/tables/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/tables/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/tables/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="<?php echo base_url(); ?>assets/tables/css/sb-admin.css" rel="stylesheet">

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
                        <?php  $wish = $value->id; }  ?>
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
                <div id="content-wrapper">

                    <div class="container-fluid">
                        <?php if(count($added_products) == 0) {?>
                            <div class="card-body">
                               No Data
                            </div>
                        <?php }else{?>
                        <!-- DataTables Example -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table"></i>
                                Added Items</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th><b>Product Name</b></th>
                                            <th><b>Image</b></th>
                                            <th><b>Description</b></th>
                                            <th><b>Quantity</b></th>
                                            <th><b>Price</b></th>
                                            <th><b>Added On</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($added_products as $key=>$value){?>
                                        <tr>
                                            <td><?php echo $value->product_title;?><br>
                                                <?php if($value->priority == MUST_HAVE){?>
                                                    <kbd>Must</kbd>
                                                <?php }else if($value->priority == WOULD_BE_NICE_TO_HAVE){?>
                                                    <kbd>Nice</kbd>
                                                <?php }else{?>
                                                    <kbd>Can</kbd>
                                                <?php }?>
                                            </td>
                                            <td><img width="30%" src="<?php echo base_url(); ?>assets/<?php echo $value->file_path;?>"></td>
                                            <td><?php echo $value->product_desc;?></td>
                                            <td><?php echo $value->added_product_qty;?></td>
                                            <td>$<?php echo $value->product_price;?></td>
                                            <td><?php echo $value->added_product_created_at;?></td>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-wrapper -->
                <?php if(count($added_products) != 0) {?>
                <div class="pactions" style="margin-left: 900px">
                    <a href="<?php echo base_url(); ?>index.php/WishlistController/editWishlist" title="">Edit Wishlist</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section>
        <div class="block gray less-top less-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribetitle">
                            <h3>Newsletter</h3>
                            <p>Send your Wishlist to others</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subsform">
                            <form action="<?php echo base_url(); ?>index.php/EmailController/sendMail/<?php echo $_SESSION['userid']?>/<?php echo $wish ?>" method="post">
                                <input type="hidden" value="<?php echo $wish ?>">
                                <input type="text" name="email" placeholder="Enter your email" />
                                <button type="submit">Email Wishlist</button>
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

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/tables/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/tables/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/tables/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/tables/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/tables/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/tables/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url(); ?>assets/tables/js/demo/datatables-demo.js"></script>


</body>
</html>

