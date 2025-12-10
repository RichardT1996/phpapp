<?php
require_once 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        header('Location: contact.php?error=missing_fields');
        exit;
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: contact.php?error=invalid_email');
        exit;
    }
    
    try {
        $db = new Dbconnection();
        $conn = $db->connect();
        
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);
        
        header('Location: contact.php?success=1');
        exit;
    } catch(PDOException $e) {
        header('Location: contact.php?error=database');
        exit;
    }
} else {
    header('Location: contact.php');
    exit;
}
?>
