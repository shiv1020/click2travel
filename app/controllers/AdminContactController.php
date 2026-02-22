<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();

$stmt = $pdo->query("
    SELECT id, first_name, last_name, email, phone, message, created_at
    FROM contacts
    ORDER BY created_at DESC
");

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../../public/admin/contact.php';
