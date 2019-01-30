<?php
/**
 * Created by PhpStorm.
 * User: ACER
 * Date: 1/29/2019
 * Time: 12:08 PM
 */
?>


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
<form action="<?php echo base_url(); ?>index.php/WishlistController/edit" method="post">
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
                        <?php $name = $value->wishlist_name; }  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="block">
            <div class="container">
                <div class="pactions">
                    <input type="text" name="wishlist_name" placeholder="Edit Wishlist Name" value="<?php echo $name ?>">
                </div>
                <div id="content-wrapper">

                    <div class="container-fluid">
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
                                            <th><b>Action</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($added_products as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $value->product_title;?></td>
                                                <td><img width="50%" src="<?php echo base_url(); ?>assets/<?php echo $value->file_path;?>"></td>
                                                <td><?php echo $value->product_desc;?></td>
                                                <td><input type="number" id="quantity" onchange="calculateText();" name="qty" placeholder="<?php echo $value->added_product_qty;?>"></td>
                                                <td><labal id="total">$<?php echo $value->product_price;?></labal><input type="hidden" id="price" name="price" value="<?php echo $value->product_price;?>">
                                                    <input type="hidden" id="tot" name="tot" >
                                                </td>
                                                <td><?php echo $value->added_product_created_at;?></td>
                                                <td><a href="<?php echo base_url()?>index.php/WishlistController/removeItem/<?php echo $value->added_id;?>" class="btn btn-danger"> × Remove</a></td>
                                            </tr>
                                            <input type="hidden" name="uid" value="<?php echo $value->wish_userId;?>">
                                            <input type="hidden" name="product_id" value="<?php echo $value->added_product_id;?>">
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-wrapper -->
            </div>
        </div>
    </section>
        <section>
            <div>
                <button type="submit" class="btn">SAVE MY WISHLIST</button>
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
</form>

<script>
    function calculateText(){
        var price = document.getElementById("price").value;
        var quantity=document.getElementById("quantity").value;
        var total=price*quantity;
        document.getElementById('total').innerHTML = "$"+total ;
        document.getElementById('tot').innerHTML = total.toFixed(2) ;

        console.log("total: $"+total);

    }
</script>

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

