<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

// Bookings with latest payment status
$stmt = $pdo->query("
    SELECT b.id, b.guests, b.arrival_date, b.status AS booking_status, b.total_amount,
           u.name AS user_name, u.email AS user_email,
           p.name AS package_name, p.duration AS package_duration,
           (SELECT pay.payment_status FROM payments pay 
            WHERE pay.booking_id = b.id 
            ORDER BY pay.created_at DESC LIMIT 1) AS payment_status
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN packages p ON b.package_id = p.id
    ORDER BY b.created_at DESC
");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Status counts
$countPending = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'pending'")->fetchColumn();
$countConfirmed = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'confirmed'")->fetchColumn();
$countCancelled = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'cancelled'")->fetchColumn();
$countPaymentsPaid = $pdo->query("SELECT COUNT(*) FROM payments WHERE payment_status = 'paid'")->fetchColumn();
$countPaymentsRequested = $pdo->query("SELECT COUNT(*) FROM payments WHERE payment_status = 'requested'")->fetchColumn();
$countPaymentsFailed = $pdo->query("SELECT COUNT(*) FROM payments WHERE payment_status = 'failed'")->fetchColumn();

require __DIR__ . '/../../public/admin/status.php';
