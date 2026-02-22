<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$booking_id = $_GET['id'];

$pdo = Database::getInstance()->getConnection();

$pdo->prepare("UPDATE bookings SET status='confirmed' WHERE id=?")
    ->execute([$booking_id]);

$pdo->prepare("
    UPDATE payments 
    SET payment_status='paid'
    WHERE booking_id=?
")->execute([$booking_id]);

header("Location: " . BASE_URL . "index.php?page=admin_dashboard");
exit;