<?php

require_once __DIR__ . '/../core/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit;
}

$pdo = Database::getInstance()->getConnection();

$booking_id = intval($_GET['booking_id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT b.*, 
           p.name AS package_name,
           p.duration,
           p.price,
           pay.receipt_no,
           pay.payment_status
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    JOIN payments pay ON pay.booking_id = b.id
    WHERE b.id = ? AND b.user_id = ?
");

$stmt->execute([$booking_id, $_SESSION['user_id']]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    die("Invoice not found");
}

require __DIR__ . '/../../public/views/invoice.php';