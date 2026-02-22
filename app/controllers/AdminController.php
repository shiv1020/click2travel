<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->query("
    SELECT b.id, u.name AS user_name, p.name AS package_name,
           b.guests, b.total_amount, b.status
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN packages p ON b.package_id = p.id
    ORDER BY b.created_at DESC
");

$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/admin/dashboard.php';