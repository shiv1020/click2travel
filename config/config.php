<?php
define('BASE_URL', getenv('BASE_URL') ? rtrim(getenv('BASE_URL'), '/') . '/' : '/click2travel/public/');
require_once __DIR__ . '/../app/core/Database.php';

session_start();
