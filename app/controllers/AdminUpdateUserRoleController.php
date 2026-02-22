<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$role = isset($_GET['role']) ? strtolower(trim($_GET['role'])) : '';

if ($id <= 0 || !in_array($role, ['admin', 'user'])) {
    header("Location: " . BASE_URL . "index.php?page=admin_users");
    exit;
}

// Prevent admin from changing their own role
if ($id === (int)($_SESSION['user_id'] ?? 0)) {
    header("Location: " . BASE_URL . "index.php?page=admin_users");
    exit;
}

$pdo = Database::getInstance()->getConnection();
$stmt = $pdo->prepare("UPDATE users SET role = ? WHERE id = ?");
$stmt->execute([$role, $id]);

header("Location: " . BASE_URL . "index.php?page=admin_users");
exit;
