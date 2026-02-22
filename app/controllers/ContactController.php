<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../core/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first = trim($_POST['first_name'] ?? '');
    $last  = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($first) || empty($email) || empty($message)) {
        die("Required fields missing.");
    }

    $pdo = Database::getInstance()->getConnection();

    $stmt = $pdo->prepare("
        INSERT INTO contacts
        (first_name, last_name, email, phone, message, created_at)
        VALUES (?, ?, ?, ?, ?, NOW())
    ");

    $stmt->execute([$first, $last, $email, $phone, $message]);

    // echo "<script>alert('Message Sent Successfully!');</script>";
    // echo "<script>window.location='?page=contact';</script>";
        header("Location: " . BASE_URL . "index.php?page=thankyou");

    exit;
}