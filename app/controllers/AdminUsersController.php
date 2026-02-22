<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->query("
    SELECT id, name, email, password, phone, role, created_at
    FROM users
    ORDER BY created_at DESC
");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/admin/users.php';
