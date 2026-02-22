<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

// Bookings list (for future use e.g. Bookings page)
$stmt = $pdo->query("
    SELECT b.id, u.name AS user_name, p.name AS package_name,
           b.guests, b.total_amount, b.status
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN packages p ON b.package_id = p.id
    ORDER BY b.created_at DESC
");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Dashboard counts
$countBookings = $pdo->query("SELECT COUNT(*) FROM bookings")->fetchColumn();
$countPackages = $pdo->query("SELECT COUNT(*) FROM packages")->fetchColumn();
$countContacts = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
$countUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$countCancelRequests = $pdo->query("SELECT COUNT(*) FROM bookings WHERE status = 'cancelled'")->fetchColumn();

// All packages for "Your Packages" grid
$packages = $pdo->query("SELECT * FROM packages ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/admin/dashboard.php';