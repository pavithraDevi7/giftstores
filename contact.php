<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'All required fields must be filled']);
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Please enter a valid email']);
        exit;
    }
    
    try {
        // XAMPP MySQL - UPDATE YOUR CREDENTIALS
        $pdo = new PDO("mysql:host=localhost;dbname=giftstore;charset=utf8mb4", 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Save to database
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, subject, message, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $phone, $subject, $message]);
        
        //  PROFESSIONAL SUCCESS RESPONSE
        $response = [
            'status' => 'success',
            'icon' => 'Done',
            'title' => 'Message Sent Successfully!',
            'message' => 'Your inquiry has been received and our team will respond within 24 hours.',
            'details' => [
                'name' => htmlspecialchars($name),
                'email' => $email,
                'subject' => htmlspecialchars($subject),
                'submitted' => date('M d, Y \a\t g:i A'),
                'ticket_id' => 'GIFT-' . strtoupper(substr(md5($email . time()), 0, 8))
            ],
            'next_steps' => [
                ' Check your email for confirmation',
                ' Visit FAQ for instant answers', 
                ' Expect reply within 24 hours'
            ]
        ];
        
        echo json_encode($response, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        
    } catch(PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error. Please try again.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
