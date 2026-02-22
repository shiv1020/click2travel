<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

$pdo = Database::getInstance()->getConnection();
$packages = $pdo->query("SELECT * FROM packages ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

$editPackage = null;
if (!empty($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
    $stmt->execute([$id]);
    $editPackage = $stmt->fetch(PDO::FETCH_ASSOC);
}

require __DIR__ . '/../../public/admin/manage_packages.php';
