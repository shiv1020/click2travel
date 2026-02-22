<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: " . BASE_URL . "index.php?page=admin_status");
    exit;
}

$pdo = Database::getInstance()->getConnection();
$pdo->prepare("UPDATE bookings SET status = 'cancelled' WHERE id = ?")->execute([$id]);

header("Location: " . BASE_URL . "index.php?page=admin_status");
exit;
