<?php
session_start();

if(!isset($_SESSION["userid"])) {
    header("Location:login.php");
    exit();
}

if(isset($_POST['submit'])) {

    $conn = mysqli_connect("localhost","root","","giftstore");
    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    $fname  = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname  = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email  = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone  = mysqli_real_escape_string($conn, $_POST["phone"]);
    $add    = mysqli_real_escape_string($conn, $_POST["address"]);
    $c_name = mysqli_real_escape_string($conn, $_POST['nameoncard']);
    $c_no   = mysqli_real_escape_string($conn, $_POST['Creditcardnumber']);
    $year   = mysqli_real_escape_string($conn, $_POST['expyear']);
    $month  = mysqli_real_escape_string($conn, $_POST['expmonth']);
    $cvv    = mysqli_real_escape_string($conn, $_POST['cvv']);

    $full_name = $fname." ".$lname;

    // insert into checkout table (your existing fields)
    $sql_checkout = "INSERT INTO checkout
        (name,email,phone,address,card_name,card_no,exp_year,exp_month,cvv,total_amount)
        VALUES ('$full_name','$email','$phone','$add','$c_name','$c_no','$year','$month','$cvv',0)";

    if(!mysqli_query($conn,$sql_checkout)){
        die("Checkout insert error: ".mysqli_error($conn));
    }

    $last_checkout_id = mysqli_insert_id($conn);

    // build product_details and insert into orders
    $total_amount    = 0;
    $product_details = array();

    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $values) {

            $product_table = mysqli_real_escape_string($conn, $values['item_category']);
            $product_id    = (int)$values['item_id'];
            $product_name  = mysqli_real_escape_string($conn, $values['item_name']);
            $price         = (float)$values['item_price'];
            $quantity      = (int)$values['item_quantity'];

            $subtotal      = $price * $quantity;
            $total_amount += $subtotal;

            // save for PDF / thankyou page
            $product_details[] = array(
                'name'     => $product_name,
                'price'    => $price,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            );

            // your existing orders insert
            $order_sql = "INSERT INTO orders
                (checkout_id, product_table, product_id, product_name, price, quantity)
                VALUES ($last_checkout_id,'$product_table',$product_id,'$product_name',$price,$quantity)";
            mysqli_query($conn,$order_sql);
        }

        // update total in checkout table
        mysqli_query($conn,"UPDATE checkout SET total_amount = $total_amount WHERE id = $last_checkout_id");

        // clear cart
        unset($_SESSION["shopping_cart"]);
    }

    // estimated delivery date (or your random logic)
    $delivery_date = date("d M Y", strtotime("+3 days"));

    // save order info in session for thankyou.php + PDF
    $_SESSION['name']            = $full_name;
    $_SESSION['email']           = $email;
    $_SESSION['phone']           = $phone;
    $_SESSION['address']         = $add;
    $_SESSION['order_id']        = $last_checkout_id;
    $_SESSION['total_amount']    = $total_amount;
    $_SESSION['product_details'] = $product_details;
    $_SESSION['delivery_date']   = $delivery_date;

    mysqli_close($conn);
    header("Location:thankyou.php");
    exit();
}
?>
<!-- your existing checkout HTML starts here (do NOT change) -->


<!-- keep your existing HTML form, BUT ensure all input name attributes are:
fname, lname, email, phone, address, nameoncard, Creditcardnumber, expyear, expmonth, cvv and button name="submit" -->

<!DOCTYPE html>
<html>
<head>
    <title>GiftStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <!-- Font Awesome Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Materialized CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/go_to.css">
    <link rel="stylesheet" href="css/style1.css">
    <style>
        .errorMessage { font-size: 18px; }
        .errorMessage i, .errorMessage [class^="mdi-"], .breadcrumb [class*="mdi-"], .errorMessage i.material-icons {
            display: inline-block; float: left; font-size: 24px;
        }
        .errorMessage:before {
            color: rgba(255, 255, 255, 0.7); vertical-align: top; display: inline-block;
            font-family: 'Material Icons'; font-weight: normal; font-style: normal;
            font-size: 25px; margin: 0 10px 0 8px; -webkit-font-smoothing: antialiased;
        }
        .errorMessage:first-child:before { display: none; }
        .invalid { color: red; font-size: 1em; }
        body{ background-image:url("images/space.jpg"); background-size:cover; background-repeat:no-repeat; }
        .container{ opacity:0.6; }
        .material-icons{ font-weight:bold; }
        .cart-summary { background: rgba(255,255,255,0.2); padding: 15px; margin: 10px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <!--navigation bar-->
    <div class="row navbar-fixed">
        <nav class="black">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">GiftStore</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="categories1" class="dropdown-content" databeloworigin="true">
                    <li><a href="category1.php" class="dropdown_link">Kids</a></li>
                    <li><a href="category2.php" class="dropdown_link">PhoneCase</a></li>
                    <li><a href="category3.php" class="dropdown_link">Home Decor</a></li>
                    <li><a href="category4.php" class="dropdown_link">Watches</a></li>
                    <li><a href="category5.php" class="dropdown_link">Jewellery</a></li>
                    <li><a href="category6.php" class="dropdown_link">Soft Toys</a></li>
                    <li><a href="category7.php" class="dropdown_link">Crockery</a></li>
                    <li><a href="category8.php" class="dropdown_link">Wallet</a></li>
                </ul>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <form action="search.php" method="POST">
                        <li><input type="text" name="search" placeholder="search"></li>
                        <?php
                        if(isset($_SESSION['userid'])){
                        ?>
                            <li><a href="index.php" class="navlink">Home</a></li>
                            <li><a href="#" class="dropdown-trigger navlink" data-activates="categories1">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a href="aboutus.html" class="navlink">About Us</a></li>
                            <li><a href="contactus.html" class="navlink">Contact Us</a></li>
                            <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown2"><?php echo $_SESSION['userid']?><i class="material-icons right">arrow_drop_down</i></a></li>
                            <li><a href="shopping_cart.php" class="navlink"><i class="material-icons">shopping_cart</i></a></li>
                        <ul id="dropdown2" class="dropdown-content dropdown_link">
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <?php
                        }
                        else{
                        ?>
                        <li><a href="index.php" class="navlink">Home</a></li>
                        <li><a href="#" class="dropdown-trigger navlink" data-activates="categories1">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="aboutus.html" class="navlink">About Us</a></li>
                        <li><a href="contactus.html" class="navlink">Contact Us</a></li>
                        <li><a href="signup.php" class="navlink">Sign Up</a></li>
                        <li><a href="shopping_cart.php" class="navlink"><i class="material-icons">shopping_cart</i></a></li> 
                        <?php
                        }
                        ?>
                    </form> 
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="index.php" class="side_logo left-align">GiftStore</a></li>
                    <hr>
                    <li><a href="index.php" class="side_nav">Home</a></li>
                    <li><a href="aboutus.html" class="side_nav">About Us</a></li>
                    <li><a href="contactus.html" class="side_nav">Contact Us</a></li>
                    <li><a href="signup.php" class="side_nav">SignUp</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <!-- Form Starts -->
    <div class="container" style="margin-top:-20px;">
        <div class = "row">
            <div class = "col s12 m12 l12" class="center-align">
                <div class = "card blue-grey lighten-4 black-text">
                    <div class = "card-content"> 
                        <div class="center-align contacttitle"><span class="blue-text text-lighten-2">C</span>heckout <span class="blue-text text-lighten-2">F</span>orm</div>
                        <hr/> 
                        
                        <!--  CART SUMMARY -->
                        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                        <div class="cart-summary">
                            <h5>🛒 Your Cart (<?php echo count($_SESSION['cart']); ?> items)</h5>
                            <?php 
                            $total = 0;
                            echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';
exit;

                            foreach($_SESSION['cart'] as $item): 
                                $subtotal = $item['price'] * $item['qty'];
                                $total += $subtotal;
                            endforeach;
                            ?>
                            <?php foreach(array_slice($_SESSION['cart'], 0, 3) as $item): ?>
                                <div><?php echo $item['name']; ?> x<?php echo $item['qty']; ?> - ₹<?php echo $item['price'] * $item['qty']; ?></div>
                            <?php endforeach; ?>
                            <?php if(count($_SESSION['cart']) > 3): ?>
                                <div>... +<?php echo count($_SESSION['cart']) - 3; ?> more items</div>
                            <?php endif; ?>
                            <strong>Total: ₹<?php echo $total; ?></strong>
                        </div>
                        <?php endif; ?>
                        
                        <div class = "row">
                            <form class = "col s12" id="checkoutForm" method="POST" action="checkout.php">
                                <div class = "row">
                                    <div class = "input-field col s12">  
                                        <i class="material-icons prefix">account_circle</i>               
                                        <input name = "fname" type = "text" required />
                                        <label for = "fname">First Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">account_circle</i>                
                                        <input name = "lname" type = "text" required/>
                                        <label for = "lname">Last Name</label>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">email</i>
                                        <input name = "email" type = "email" required/>
                                        <label for = "email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">phone</i>                
                                        <input name = "phone" type = "number" required/>
                                        <label for = "phone">Phone</label>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">message</i>
                                        <textarea name="address" class = "materialize-textarea" onkeyup="countChar(this);" required></textarea>
                                        <label for = "address">Address</label>
                                        <div id="charNum" class="right"></div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <h3>Payment Details</h3>
                                    <label><h5>Accepted Cards</h5></label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;font-size: 50px;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;font-size: 50px;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;font-size: 50px;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;font-size: 50px;"></i> 
                                    </div>
                                </div>
                                
                                <div class = "row">
                                    <div class = "input-field col s12">  
                                        <i class="material-icons prefix">account_circle</i>               
                                        <input name = "nameoncard" type = "text" required />
                                        <label for = "nameoncard">Name on card</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">credit_card</i>                
                                        <input name = "Creditcardnumber" type = "number" required/>
                                        <label for = "Creditcardnumber">Credit card number</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class = "input-field col s6">
                                        <i class="material-icons prefix">event_busy</i>                
                                        <input name = "expyear" type = "number" required/>
                                        <label for = "expyear">Exp year</label>
                                    </div>
                                    <div class = "input-field col s6">
                                        <i class="material-icons prefix">event_busy</i>                
                                        <input name = "expmonth" type = "number" required/>
                                        <label for = "expmonth">Exp month</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class = "input-field col s12">
                                        <i class="material-icons prefix">lock</i>             
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 l12 ">
                                        <h5 class="center-align">
                                            <button type="submit" name="submit" class="waves-effect waves-light btn black lighten-1 white-text">
                                                <i class="material-icons left">payment</i> Complete Order
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                            </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Page Footer -->
    <div class="row" style="margin-top:-20px;">
        <footer class="page-footer grey darken-4 white-text">
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <h4><a href="index.php" class="footerlogo">GiftStore</a></h4>
                </div>
            </div>
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <a href="index.php" class="link">Home<span class="white-text"> |</span></a> 
                    <a href="aboutus.php" class="link">About Us<span class="white-text"> |</span></a> 
                    <a href="contactus.php" class="link">Contact Us<span class="white-text"> |</span></a> 
                </div>
            </div> 
            <div class="row center-align">
                <div id="social">
                    <a class="facebookBtn smGlobalBtn" href="#!"></a>
                    <a class="googleplusBtn smGlobalBtn" href="#!"></a>
                </div>
            </div>
            <div class="row center-align marginReduce footer-copyright" style="margin-bottom:-20px;">
                <div id="footertext" class="col s12 m12 l12">
                    &copy 2018 Copyright Text .All Rights reserved.
                </div>
            </div>
        </footer>
    </div> 
    
    <!-- Go To Top -->
    <div id="go-top" style="display: none;">
        <a title="Back to Top" href="#"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
<script src="js/jquery.validate.min.js"></script>
<script src="js/additional-methods.min.js"></script>
<script src="js/init.js"></script>
<script>
    $(document).ready(function(){
        $('.dropdown-trigger').dropdown({ belowOrigin:true });
        $('#go-top').click(function(){ $("html, body").animate({ scrollTop: 0 }, 600); return false; });
        $('input#input_text, textarea#message1').characterCounter();
    });
    
    var pxShow = 100;
    var fadeInTime = 400;
    var fadeOutTime = 400;
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() >= pxShow) {
            jQuery("#go-top").fadeIn(fadeInTime);
        } else {
            jQuery("#go-top").fadeOut(fadeOutTime);
        }
    });
    
    jQuery.validator.setDefaults({
        errorClass: 'errorMessage invalid',
        validClass: "valid",
        errorElement : 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) { $(placement).append(error) } 
            else { error.insertAfter(element); }
        }
    });
    
    $("#checkoutForm").validate({
        rules: {
            fname: { required: true, pattern: /^[a-zA-Z ]+$/, maxlength: 10 },
            lname: { required: true, pattern: /^[a-zA-Z ]+$/, maxlength: 10 },
            phone: { required: true, digits: true, minlength: 10, maxlength: 10 },
            email: { required: true, email: true, pattern: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, maxlength: 64 }, 
            address: { required: true, minlength: 10, maxlength: 400 },
            nameoncard: { required: true, pattern: /^[a-zA-Z ]+$/, minlength: 6, maxlength: 20 },
            expyear: { required:true, pattern:/^[0-9]+$/, digits: true, minlength: 2, maxlength: 4 },
            expmonth: { required:true, pattern:/^[0-9 ]+$/, digits: true, minlength: 1, maxlength: 2 },
            cvv: { required:true, pattern:/^[0-9 ]+$/, digits: true, minlength: 3, maxlength: 3 },
            Creditcardnumber: { required: true, digits: true, minlength: 16, maxlength: 16 }
        }
    });
    
    function countChar(val) {
        var len = val.value.length;
        if (len >= 500) { val.value = val.value.substring(0, 500); }
        else { $('#charNum').text(len+"/500"); }
    };
</script>
</html>
