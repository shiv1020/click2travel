<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: " . BASE_URL . "index.php?page=admin_users");
    exit;
}

// Prevent admin from deleting themselves
if ($id === (int)($_SESSION['user_id'] ?? 0)) {
    header("Location: " . BASE_URL . "index.php?page=admin_users");
    exit;
}

$pdo = Database::getInstance()->getConnection();

// Delete saved_payments for this user
$pdo->prepare("DELETE FROM saved_payments WHERE user_id = ?")->execute([$id]);

// Delete user (bookings and payments cascade via FK)
$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);

header("Location: " . BASE_URL . "index.php?page=admin_users");
exit;
