<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../helpers/auth_helper.php';

requireLogin();

$pdo = Database::getInstance()->getConnection();

/* ================= USER INFO ================= */
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

/* ================= TRAVEL STATS ================= */
$statsStmt = $pdo->prepare("
    SELECT 
        COUNT(b.id) AS total_trips,
        SUM(CASE WHEN pay.payment_status = 'Paid' THEN 1 ELSE 0 END) AS completed_trips,
        SUM(CASE WHEN pay.payment_status = 'Pending' THEN 1 ELSE 0 END) AS upcoming_trips,
        SUM(pay.amount) AS total_spent
    FROM bookings b
    LEFT JOIN payments pay ON pay.booking_id = b.id
    WHERE b.user_id = ?
");
$statsStmt->execute([$_SESSION['user_id']]);
$stats = $statsStmt->fetch(PDO::FETCH_ASSOC);

/* ================= RECENT BOOKINGS ================= */
$bookingsStmt = $pdo->prepare("
    SELECT p.name AS package_name, pay.receipt_no, pay.amount, pay.payment_status
    FROM bookings b
    JOIN packages p ON b.package_id = p.id
    LEFT JOIN payments pay ON pay.booking_id = b.id
    WHERE b.user_id = ?
    ORDER BY b.created_at DESC
    LIMIT 5
");
$bookingsStmt->execute([$_SESSION['user_id']]);
$recentBookings = $bookingsStmt->fetchAll(PDO::FETCH_ASSOC);

/* ================= SAVED PAYMENTS ================= */
$savedStmt = $pdo->prepare("
    SELECT * FROM saved_payments WHERE user_id = ?
");
$savedStmt->execute([$_SESSION['user_id']]);
$savedPayments = $savedStmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/views/profile.php';