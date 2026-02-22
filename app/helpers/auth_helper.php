<?php

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "index.php?page=login");
        exit;
    }
}

function requireAdmin() {
    if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: " . BASE_URL . "index.php?page=login");
        exit;
    }
}