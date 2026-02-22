<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

if (!isset($_GET['id'])) {
    header("Location: " . BASE_URL . "index.php?page=admin_manage_packages");
    exit;
}

$id = (int) $_GET['id'];
$pdo = Database::getInstance()->getConnection();
$pdo->prepare("DELETE FROM packages WHERE id = ?")->execute([$id]);

header("Location: " . BASE_URL . "index.php?page=admin_manage_packages");
exit;
