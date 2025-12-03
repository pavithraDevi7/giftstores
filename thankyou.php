<?php
session_start();
require 'fpdf.php';   // fpdf.php must be in the same folder as thankyou.php

// get data from session
$customer_name    = $_SESSION['name']            ?? 'Customer';
$customer_email   = $_SESSION['email']           ?? '';
$customer_phone   = $_SESSION['phone']           ?? '';
$customer_address = $_SESSION['address']         ?? '';
$order_id         = $_SESSION['order_id']        ?? 0;
$total_amount     = $_SESSION['total_amount']    ?? 0;
$product_details  = $_SESSION['product_details'] ?? array();
$delivery_date    = $_SESSION['delivery_date']   ?? date("d M Y", strtotime("+3 days"));

// handle PDF download
if (isset($_GET['download_order_pdf'])) {

    $pdf = new FPDF();
    $pdf->AddPage();

    // Title
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(0,10,'GiftStore Order Confirmation',0,1,'C');
    $pdf->Ln(5);

    // Customer & order info
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,8,'Order ID: #'.$order_id,0,1);
    $pdf->Cell(0,8,'Name: '.$customer_name,0,1);
    $pdf->Cell(0,8,'Email: '.$customer_email,0,1);
    $pdf->Cell(0,8,'Phone: '.$customer_phone,0,1);
    $pdf->Cell(0,8,'Delivery Date: '.$delivery_date,0,1);
    $pdf->Ln(5);

    // Table header
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(80,8,'Product',1);
    $pdf->Cell(20,8,'Qty',1,0,'C');
    $pdf->Cell(40,8,'Price',1,0,'R');
    $pdf->Cell(40,8,'Total',1,1,'R');

    // Product rows
    $pdf->SetFont('Arial','',10);
    foreach ($product_details as $item) {
        $name     = $item['name']     ?? '';
        $qty      = $item['quantity'] ?? 0;
        $price    = $item['price']    ?? 0;
        $subtotal = $item['subtotal'] ?? ($price * $qty);

        $pdf->Cell(80,8,substr($name,0,35),1);
        $pdf->Cell(20,8,$qty,1,0,'C');
        $pdf->Cell(40,8,'₹'.number_format($price,2),1,0,'R');
        $pdf->Cell(40,8,'₹'.number_format($subtotal,2),1,1,'R');
    }

    // Grand total
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(140,10,'GRAND TOTAL:',1,0,'R');
    $pdf->Cell(40,10,'₹'.number_format($total_amount,2),1,1,'R');

    // Delivery address
    $pdf->Ln(8);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(0,8,'Delivery Address:',0,1);
    $pdf->SetFont('Arial','',10);
    $pdf->MultiCell(0,6,$customer_address);

    $filename = 'GiftStore_Order_'.$order_id.'.pdf';
    $pdf->Output('D', $filename);
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>GiftStore - Order Confirmed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <link rel="stylesheet" href="css/go_to.css">
    <link rel="stylesheet" href="css/style1.css">
    
    <style>
        body{ 
            background-image:url("images/space.jpg"); 
            background-size:cover; 
            background-repeat:no-repeat; 
            background-attachment: fixed;
        }
        .container{ 
            opacity:0.95; 
            margin-top:60px; 
            padding-bottom:50px;
        }
        .success-card {
            background: linear-gradient(135deg, #28a745, #20c997) !important;
            color: white !important;
            border-radius: 25px !important;
            box-shadow: 0 20px 40px rgba(40,167,74,0.3) !important;
            margin: 20px 0;
        }
        .order-details-card {
            background: rgba(255,255,255,0.97) !important;
            border-radius: 20px !important;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
            backdrop-filter: blur(10px);
        }
        .pdf-download-btn {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
            color: white !important;
            border-radius: 30px !important;
            padding: 20px 45px !important;
            font-size: 20px !important;
            font-weight: bold !important;
            margin: 30px auto !important;
            display: block !important;
            width: 380px !important;
            text-align: center !important;
            box-shadow: 0 12px 35px rgba(102,126,234,0.4) !important;
            transition: all 0.4s ease !important;
            text-decoration: none !important;
            border: 2px solid rgba(255,255,255,0.3) !important;
        }
        .pdf-download-btn:hover {
            transform: translateY(-5px) scale(1.02) !important;
            box-shadow: 0 20px 50px rgba(102,126,234,0.6) !important;
            color: white !important;
        }
        .total-highlight {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
            color: white !important;
            padding: 25px !important;
            border-radius: 20px !important;
            font-size: 28px !important;
            font-weight: bold !important;
            margin: 25px 0;
            box-shadow: 0 10px 30px rgba(102,126,234,0.3) !important;
        }
        .material-icons {
            vertical-align: middle;
            margin-right: 8px;
        }
        @media print {
            .pdf-download-btn, .continue-shopping { display: none !important; }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar - EXACT SAME AS CHECKOUT -->
    <div class="row navbar-fixed">
        <nav class="black">
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo">GiftStore</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php if(isset($_SESSION['userid'])): ?>
                        <li><a href="index.php" class="navlink">Home</a></li>
                        <li><a href="aboutus.html" class="navlink">About Us</a></li>
                        <li><a href="contactus.html" class="navlink">Contact Us</a></li>
                        <li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown2"><?php echo $_SESSION['userid']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                        <ul id="dropdown2" class="dropdown-content">
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    <?php else: ?>
                        <li><a href="index.php" class="navlink">Home</a></li>
                        <li><a href="aboutus.html" class="navlink">About Us</a></li>
                        <li><a href="contactus.html" class="navlink">Contact Us</a></li>
                        <li><a href="signup.php" class="navlink">Sign Up</a></li>
                    <?php endif; ?>
                    <li><a href="shopping_cart.php" class="navlink"><i class="material-icons">shopping_cart</i></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <!-- SUCCESS ANNOUNCEMENT -->
            <div class="col s12 center-align">
                <div class="card success-card">
                    <div class="card-content white-text" style="padding: 50px 30px;">
                        <i class="material-icons" style="font-size: 80px;">check_circle</i>
                        <h1 style="font-size: 42px; margin: 10px 0;">Order Confirmed!</h1>
                        <h3 style="margin: 10px 0;">Order #<?php echo $order_id; ?></h3>
                        <p style="font-size: 20px; line-height: 1.6; opacity: 0.95;">
                            Thank you for shopping with <strong>GiftStore</strong>! 
                            Your order has been confirmed and will be processed shortly.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ORDER DETAILS CARD -->
            <div class="col s12 m10 l10 offset-m1 offset-l1">
                <div class="card order-details-card">
                    <div class="card-content">
                        <span class="card-title" style="color: #667eea; font-size: 28px;">
                            <i class="material-icons">receipt_long</i> Order Summary
                        </span>
                        
                        <!-- Customer & Delivery Info -->
                        <div class="row" style="margin-top: 30px;">
                            <div class="col s12 m6 l6">
                                <h5 style="color: #667eea; margin-bottom: 15px;">
                                    <i class="material-icons">person_outline</i> Customer Details
                                </h5>
                                <div style="font-size: 16px; line-height: 1.6;">
                                    <p><strong><?php echo htmlspecialchars($customer_name); ?></strong></p>
                                    <p><i class="material-icons" style="font-size:16px; color:#666;">email</i> 
                                        <?php echo htmlspecialchars($customer_email); ?></p>
                                    <p><i class="material-icons" style="font-size:16px; color:#666;">phone</i> 
                                        <?php echo htmlspecialchars($customer_phone); ?></p>
                                </div>
                            </div>
                            <div class="col s12 m6 l6">
                                <h5 style="color: #667eea; margin-bottom: 15px;">
                                    <i class="material-icons">local_shipping</i> Delivery Information
                                </h5>
                                <div style="font-size: 16px; line-height: 1.6;">
                                    <p><strong>Order ID:</strong> #<?php echo $order_id; ?></p>
                                    <p><strong>Est. Delivery:</strong> 
                                        <span style="color: #28a745; font-size: 18px; font-weight: bold;">
                                            <?php echo $delivery_date; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- PRODUCTS TABLE -->
                        <h5 style="color: #667eea; margin: 30px 0 15px 0;">
                            <i class="material-icons">shopping_cart</i> Order Items
                        </h5>
                        <div class="table-container">
                            <table class="bordered responsive-table striped" style="margin-bottom: 25px;">
                                <thead style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                                    <tr>
                                        <th style="font-weight: bold;">Product</th>
                                        <th style="font-weight: bold; text-align: center;">Quantity</th>
                                        <th style="font-weight: bold; text-align: right;">Unit Price</th>
                                        <th style="font-weight: bold; text-align: right;">Item Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($product_details as $item): ?>
                                    <tr>
                                        <td style="font-size: 15px;"><?php echo htmlspecialchars($item['name']); ?></td>
                                        <td style="text-align: center; font-weight: bold; font-size: 16px; color: #667eea;">
                                            <?php echo $item['quantity']; ?>
                                        </td>
                                        <td style="text-align: right; font-size: 15px;">
                                            ₹<?php echo number_format($item['price'], 2); ?>
                                        </td>
                                        <td style="text-align: right; font-weight: bold; font-size: 16px; color: #28a745;">
                                            ₹<?php echo number_format($item['subtotal'], 2); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- GRAND TOTAL -->
                        <div class="total-highlight center-align">
                            <i class="material-icons" style="font-size: 40px;">payments</i>
                            GRAND TOTAL: ₹<?php echo number_format($total_amount, 2); ?>
                        </div>

                        <!-- DELIVERY ADDRESS -->
                        <div style="background: linear-gradient(90deg, #e3f2fd, #f0f8ff); 
                                    padding: 25px; border-radius: 20px; margin: 30px 0; 
                                    border-left: 6px solid #1976d2;">
                            <h5 style="color: #1976d2; margin: 0 0 20px 0;">
                                <i class="material-icons">location_on</i> Delivery Address
                            </h5>
                            <div style="font-size: 16px; line-height: 1.7; color: #333;">
                                <?php echo nl2br(htmlspecialchars($customer_address)); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 🔥 PDF DOWNLOAD BUTTON -->
            <div class="col s12 center-align" style="margin: 50px 0;">
                <a href="?download_order_pdf=1" class="pdf-download-btn waves-effect waves-light">
                    <i class="material-icons left" style="font-size: 28px;">picture_as_pdf</i>
                    📄 Download Order Invoice (PDF)
                </a>
                <p style="color: #666; font-size: 16px; margin-top: 20px; line-height: 1.6;">
                    <i class="material-icons" style="color: #28a745; vertical-align: middle;">check_circle</i>
                    Save this professional invoice for your records or print for future reference!
                </p>
            </div>

            <!-- CONTINUE SHOPPING BUTTON -->
            <div class="col s12 center-align">
                <a href="index.php" class="waves-effect waves-light btn-large black white-text" 
                   style="border-radius: 30px; padding: 20px 50px; font-size: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                    <i class="material-icons left" style="font-size: 28px;">storefront</i>
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>

    <!-- Go To Top + Scripts -->
    <div id="go-top" style="display: none;">
        <a title="Back to Top" href="#"><i class="fa fa-long-arrow-up"></i></a>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
    <script src="js/init.js"></script>
    <script>
        $(document).ready(function(){
            $(".button-collapse").sideNav();
            $(".dropdown-trigger").dropdown({belowOrigin: true});
            
            // Smooth scroll to top
            $("#go-top").click(function(){
                $("html, body").animate({scrollTop: 0}, 800);
                return false;
            });
            
            // Show go-top button
            $(window).scroll(function(){
                if($(window).scrollTop() > 200) {
                    $("#go-top").fadeIn();
                } else {
                    $("#go-top").fadeOut();
                }
            });
        });
    </script>
    <a href="thankyou.php?download_order_pdf=1" 
   class="waves-effect waves-light btn"
   style="margin-top:20px; border-radius:25px; 
          background:linear-gradient(135deg,#667eea,#764ba2);">
    <i class="material-icons left">picture_as_pdf</i>
    Download Order Invoice (PDF)
</a>

</body>
</html>
