<?php

require_once __DIR__ . '/../core/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit;
}

$pdo = Database::getInstance()->getConnection();

$booking_id = intval($_GET['booking_id'] ?? 0);

$stmt = $pdo->prepare("
    SELECT b.*, p.name AS package_name
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    WHERE b.id = ?
");
$stmt->execute([$booking_id]);

$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    die("Booking not found");
}

require __DIR__ . '/../../public/views/payment.php';