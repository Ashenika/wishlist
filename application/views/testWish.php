<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping application</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/colors/colors.css" />
    <link href="<?php echo base_url(); ?>assets/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet">
</head>
<style>
    .quantity {
        position: relative;
        cursor: pointer;
        background: url(http://localhost/wishlist/assets/images/jqueryuiTheme.png) no-repeat -3px -20px;
        height: 10px;
        width: 15px;
        left: 10px;
        top: 5px;
        display: table;
    }
    .quantity[data-type="decrease"] {
        background-position: -68px -20px;
    }
</style>

<body>

<header>
    <div class="container fluid">
        <div class="logo">
            <a href="#" title="">WISHLIST</a>
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
                        <span id="cartcount" id="wished"></span></a></li>
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
                        <?php $name = $value->wishlist_name; }  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div id="wrap">
            <div class="col-lg-8 column">
                <div class="checkoutsec">
                    <h2 id="basket-message">You have <span id="basket">0</span> items in your basket</h2>

                <ul id="default-item-list"></ul>
                </div>
            </div>
            <div class="col-lg-4 column" style="margin-left: 800px;position: absolute;">
                <form action="<?php echo base_url(); ?>index.php/WishlistController/saveToWishlist" method="post">
                <div class="ur-orders">
                    <table id="shopping-cart">
                        <tbody id="shopping-list"></tbody>
                        <tfoot style="background-color: #666666;color: #dddddd;font-size: 80%;">
                        <tr>
                            <td style="padding-left: 20px;">Total </td>
                            <td colspan="4" id="total" style="padding: 17px;padding-left: 185px;">0.00</td>
                            <input type="hidden" name="tot" id="tot" onchange="totChange();">
                        </tr>
                        </tfoot>
                    </table>
                    <input type="hidden" name="userId" value="<?php echo $_SESSION['userid']?>">
                    <div class="placeorder">
                        <button type="submit" class="btn">SAVE TO MY WISHLIST</button>
                    </div>
                </div>
                </form>
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

<script type="text/template" id="tmp-shoppingListItem">
    <div class="comment">
        <div class="avatar">
            <img src="<?php echo base_url(); ?>assets/<%= image %>">
        </div>
        <div class="comment-info">
            <a class="name"><%= title %></a>
            <span class="price">$<%= price.toFixed(2) %></span>
            <a class="wbtn"  title="" style="margin-left: 50px;"><i class="far fa-heart"></i></a>
        </div>
    </div>
</script>



<script type="text/template" id="tmp-shoppingCartItem">
    <td style="padding-top: 30px"><%= title %></td>
    <input type="hidden" name="title[]" value="<%= title %>">
    <input type="hidden" name="product_id[]" value="<%= id %>">

        <td class="quantity-total" style="padding-left: 20px;"><%= quantity %> </td>
        <input type="hidden" name="quantity[]" value="<%= quantity %>">

        <td><a class="quantity" data-type="increase"><a class="quantity" data-type="decrease"></a></a></td>


        <td class="sub-total" style="padding-left: 145px"><%= total.toFixed(2) %></td>
        <input type="hidden" name="price[]" value="<%= price.toFixed(2) %>">

        <td><a class="name"  title=""><i class="fa fa-times"></i></a></td>
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/backbone/app.js"></script>

<script>
    document.getElementById("basket").onchange = function() {
        myFunction()
    };

    function myFunction() {
        var x = document.getElementById("basket").value;
        document.getElementById("wished").innerHTML = x;
        console.log(x);
    }
   function totChange() {
       var total = document.getElementById("total").value;

       document.getElementById('tot').innerHTML = total ;
       console.log(total);
   }


</script>

</body>
</html>