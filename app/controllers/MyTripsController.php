<?php

require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../helpers/auth_helper.php';

requireLogin(); // protect page

/* ✅ CREATE PDO CONNECTION (MISSING LINE FIX) */
$pdo = Database::getInstance()->getConnection();

$receipt = $_GET['receipt'] ?? null;

if ($receipt) {

    $stmt = $pdo->prepare("
        SELECT 
            b.*, 
            p.name AS package_name, 
            u.name AS user_name, 
            u.email,
            pay.receipt_no,
            pay.amount,
            pay.payment_status
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        JOIN users u ON b.user_id = u.id
        JOIN payments pay ON pay.booking_id = b.id
        WHERE pay.receipt_no = ?
    ");

    $stmt->execute([$receipt]);

} else {

    $stmt = $pdo->prepare("
        SELECT 
            b.*, 
            p.name AS package_name, 
            u.name AS user_name, 
            u.email,
            pay.receipt_no,
            pay.amount,
            pay.payment_status
        FROM bookings b
        JOIN packages p ON b.package_id = p.id
        JOIN users u ON b.user_id = u.id
        LEFT JOIN payments pay ON pay.booking_id = b.id
        WHERE b.user_id = ?
        ORDER BY b.created_at DESC
    ");

    $stmt->execute([$_SESSION['user_id']]);
}

$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/views/mytrips.php';