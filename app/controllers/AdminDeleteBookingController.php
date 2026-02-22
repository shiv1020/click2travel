<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

if (!isset($_GET['id'])) {
    header("Location: " . BASE_URL . "index.php?page=admin_bookings");
    exit;
}

$id = (int) $_GET['id'];
$pdo = Database::getInstance()->getConnection();

// Delete related payments first (if foreign key doesn't cascade)
$pdo->prepare("DELETE FROM payments WHERE booking_id = ?")->execute([$id]);
$pdo->prepare("DELETE FROM bookings WHERE id = ?")->execute([$id]);

header("Location: " . BASE_URL . "index.php?page=admin_bookings");
exit;
