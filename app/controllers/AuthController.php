<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';

$userModel = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? null;

    if ($action === 'register') {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']); // ← ADD THIS

    if ($password !== $confirm) {
        die("Passwords do not match");
    }

    if ($userModel->findByEmail($email)) {
        die("Email already exists");
    }

    $userModel->createUser($name, $email, $password);

    header("Location: " . BASE_URL . "index.php?page=login");
    exit;
}

    if ($action === 'login') {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: " . BASE_URL . "index.php?page=admin_dashboard");
            } else {
                header("Location: " . BASE_URL . "index.php?page=home");
            }
exit;
        } else {
            die("Invalid credentials");
        }
    }
}