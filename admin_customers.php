<?php
$conn = mysqli_connect("localhost","root","","giftstore");
if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Customer Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            animation: fadeIn 0.8s ease-out;
        }
        
        body { 
            padding: 20px; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            overflow-x: auto;
        }
        
        .login-container {
            max-width: 420px; 
            margin: 80px auto; 
            background: rgba(255,255,255,0.95);
            padding: 40px; 
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            backdrop-filter: blur(10px);
            transform: translateY(20px);
            animation: slideUp 1s ease-out 0.3s both;
        }
        
        .admin-dashboard {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            backdrop-filter: blur(15px);
        }
        
        h4 {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        /* Loading Spinner */
        .loading-spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: #667eea;
            animation: spin 1s ease-in-out infinite;
        }
        
        /* Keyframe Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0; 
                transform: translateY(50px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Table Animations */
        .customers-table {
            animation: slideUp 0.8s ease-out;
            margin-top: 20px;
        }
        
        table { 
            background: rgba(255,255,255,0.98); 
            font-size: 14px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        tbody tr {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        
        tbody tr:nth-child(1) { animation-delay: 0.1s; }
        tbody tr:nth-child(2) { animation-delay: 0.2s; }
        tbody tr:nth-child(3) { animation-delay: 0.3s; }
        tbody tr:nth-child(4) { animation-delay: 0.4s; }
        tbody tr:nth-child(5) { animation-delay: 0.5s; }
        
        @keyframes fadeInUp {
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }
        
        .total-price { 
            font-weight: 700; 
            color: #4CAF50;
            font-size: 16px;
            text-shadow: 0 2px 4px rgba(76,175,80,0.3);
        }
        
        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 500;
            box-shadow: 0 8px 25px rgba(102,126,234,0.4);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102,126,234,0.6);
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white !important;
            font-weight: 500;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        /* Login Form Enhancements */
        .input-field input {
            border-bottom: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .input-field input:focus {
            border-bottom: 2px solid #667eea;
            box-shadow: 0 1px 0 0 #667eea;
        }
        
        .center-align {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .admin-dashboard { margin: 10px; padding: 20px; }
            .login-container { margin: 40px 10px; padding: 25px; }
        }
    </style>
</head>
<body>

<?php
// Simple admin password check
if(!isset($_POST['admin_pass']) || $_POST['admin_pass'] !== 'Admin123') {
    echo '
    <div class="login-container">
        <div class="center-align">
            <div class="loading-spinner mb-4" style="display:block; margin: 0 auto 20px;"></div>
            <h4> Admin Login</h4>
            <p>Enter password to view orders</p>
        </div>
        <form method="POST">
            <div class="input-field">
                <input type="password" name="admin_pass" id="admin_pass" required>
                <label for="admin_pass">Admin Password</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit" style="width:100%;">
                <i class="material-icons left">visibility</i>Show Orders
            </button>
        </form>
        <p class="center-align" style="margin-top:20px; color:#e74c3c;">
            <strong> Only Admin Can Access</strong>
        </p>
        <a href="index.php"><--Back</a>
    </div>';
} else {
    // Show loading briefly
    echo '<div style="text-align:center; padding:40px;">
            <div class="loading-spinner" style="display:inline-block;"></div>
            <p style="color:white; margin-top:20px;">Loading orders...</p>
          </div>';
    
    // REAL DATA: join checkout with orders
    $sql = "SELECT c.*,
                   GROUP_CONCAT(
                       CONCAT(o.product_name,' (x',o.quantity,') ₹',o.price * o.quantity)
                       ORDER BY o.id SEPARATOR ', '
                   ) AS products_list,
                   COALESCE(SUM(o.price * o.quantity),0) AS real_total
            FROM checkout c
            LEFT JOIN orders o ON c.id = o.checkout_id
            GROUP BY c.id
            ORDER BY c.id DESC";
    $result = mysqli_query($conn, $sql);
?>

<script>
    setTimeout(function() {
        document.querySelector('.loading-spinner').style.display = 'none';
        document.querySelectorAll('tr')[1].scrollIntoView({behavior: 'smooth'});
    }, 1500);
</script>

<div class="admin-dashboard">
    <div class="row">
        <div class="col s12 center-align">
            <h4>Customer Orders Dashboard</h4>
            <p style="color:#666; margin-bottom:20px;">Total Orders: <?php echo mysqli_num_rows($result); ?></p>
            <a href="admin_customers.php" class="btn red waves-effect waves-light">
                <i class="material-icons left">logout</i>Logout
            </a>
        </div>
    </div>
    
    <div class="customers-table">
        <table class="highlight bordered responsive-table">
            <thead>
                <tr>
                    <th><i class="material-icons">confirmation_number</i> ID</th>
                    <th><i class="material-icons">person</i> Customer</th>
                    <th><i class="material-icons">contact_mail</i> Email/Phone</th>
                    <th><i class="material-icons">shopping_cart</i> Products</th>
                    <th><i class="material-icons">attach_money</i> Total</th>
                    <th><i class="material-icons">access_time</i> Date</th>
                </tr>
            </thead>
            <tbody>

<?php
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><strong>#".$row['id']."</strong></td>";
            echo "<td>".$row['name']."<br><small>".$row['address']."</small></td>";
            echo "<td>".$row['email']."<br>".$row['phone']."</td>";

            $products_text = $row['products_list'] ?: 'No items';
            echo "<td>".$products_text."</td>";

            $total_price = ($row['real_total'] > 0) ? $row['real_total'] : $row['total_amount'];
            echo "<td class='total-price'>₹".number_format($total_price,2)."</td>";

            echo "<td>".$row['created_at']."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6' class='center-align' style='padding:40px; color:#999; font-size:18px;'>
                <i class='material-icons' style='font-size:48px; display:block;'>inventory_2</i>
                No orders yet ✨
              </td></tr>";
    }
?>

            </tbody>
        </table>
    </div>
</div>

<?php } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
<script>
    // Stagger table row animations
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>
</body>
</html>
