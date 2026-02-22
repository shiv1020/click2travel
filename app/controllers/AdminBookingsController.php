<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->query("
    SELECT b.id, b.guests, b.arrival_date, b.status, b.total_amount,
           u.name AS user_name, u.email AS user_email, u.phone AS user_phone,
           p.name AS package_name, p.duration AS package_duration
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN packages p ON b.package_id = p.id
    ORDER BY b.created_at DESC
");

$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/admin/bookings.php';
