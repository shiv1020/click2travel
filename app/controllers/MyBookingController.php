<?php

require_once __DIR__ . '/../models/Booking.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../../config/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../public/?page=login");
    exit;
}

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->prepare("
    SELECT b.*, 
           p.name AS package_name,
           pay.receipt_no
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    LEFT JOIN payments pay ON pay.booking_id = b.id
    WHERE b.user_id = ?
    ORDER BY b.created_at DESC
");

$stmt->execute([$_SESSION['user_id']]);
$recentBookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $stmt->execute([$_SESSION['user_id']]);
// $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/views/mybookings.php';