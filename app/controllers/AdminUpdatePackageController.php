<?php

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../helpers/auth_helper.php';
require_once __DIR__ . '/../core/Database.php';

requireAdmin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['id'])) {
    header("Location: " . BASE_URL . "index.php?page=admin_manage_packages");
    exit;
}

$id = (int) $_POST['id'];
$name = trim($_POST['name'] ?? '');
$description = trim($_POST['description'] ?? '');
$price = isset($_POST['price']) ? (float) $_POST['price'] : 0;
$duration = trim($_POST['duration'] ?? '');
$package_type = trim($_POST['package_type'] ?? '');
$travel_mode = trim($_POST['travel_mode'] ?? '');

$pdo = Database::getInstance()->getConnection();

$imageName = null;
if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['image']['tmp_name']);
    finfo_close($finfo);
    if (in_array($mime, $allowed)) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION) ?: 'jpg';
        $imageName = 'pkg_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . strtolower($ext);
        $uploadDir = dirname(__DIR__, 2) . '/public/assets/images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }
}

if ($imageName) {
    $stmt = $pdo->prepare("
        UPDATE packages SET name=?, description=?, price=?, duration=?, image=?, package_type=?, travel_mode=? WHERE id=?
    ");
    $stmt->execute([$name, $description, $price ?: 0, $duration, $imageName, $package_type, $travel_mode, $id]);
} else {
    $stmt = $pdo->prepare("
        UPDATE packages SET name=?, description=?, price=?, duration=?, package_type=?, travel_mode=? WHERE id=?
    ");
    $stmt->execute([$name, $description, $price ?: 0, $duration, $package_type, $travel_mode, $id]);
}

header("Location: " . BASE_URL . "index.php?page=admin_manage_packages");
exit;
