<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';
requireAdmin();

$contacts = $contacts ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Contact Requests - OnlineTour Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">
</head>
<body class="admin-body">
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <span class="brand-icon">+</span>
            <span class="brand-text">OnlineTour</span>
        </div>
        <div class="sidebar-header">
            <i class="fas fa-bars sidebar-toggle"></i>
            <span>MY STUDIO</span>
        </div>
        <nav class="sidebar-nav">
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_dashboard" class="nav-item">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_bookings" class="nav-item">
                <i class="fas fa-house"></i>
                <span>Bookings</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_manage_packages" class="nav-item">
                <i class="fas fa-file-lines"></i>
                <span>Manage Packages</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_contact" class="nav-item active">
                <i class="fas fa-users"></i>
                <span>Contact</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_users" class="nav-item">
                <i class="fas fa-user"></i>
                <span>Users</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_status" class="nav-item">
                <i class="fas fa-gear"></i>
                <span>Status</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=logout" class="nav-item">
                <i class="fas fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <main class="admin-main">
        <div class="admin-content">
            <h1 class="admin-page-title">All Contact Requests</h1>
            <div class="contact-cards-grid">
                <?php foreach ($contacts as $c): ?>
                <?php
                    $fullName = trim(($c['first_name'] ?? '') . ' ' . ($c['last_name'] ?? ''));
                    if ($fullName === '') $fullName = '—';
                ?>
                <div class="contact-card">
                    <div class="contact-card-field">
                        <span class="contact-card-label">Name</span>
                        <span class="contact-card-value"><?php echo htmlspecialchars($fullName); ?></span>
                    </div>
                    <div class="contact-card-field">
                        <span class="contact-card-label">Mo. No.</span>
                        <span class="contact-card-value"><?php echo htmlspecialchars($c['phone'] ?? '—'); ?></span>
                    </div>
                    <div class="contact-card-field">
                        <span class="contact-card-label">Email</span>
                        <span class="contact-card-value"><?php echo htmlspecialchars($c['email'] ?? '—'); ?></span>
                    </div>
                    <div class="contact-card-field contact-card-message">
                        <span class="contact-card-label">Message/Comment</span>
                        <span class="contact-card-value"><?php echo htmlspecialchars($c['message'] ?? '—'); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if (empty($contacts)): ?>
                <div class="contact-cards-empty">No contact requests found.</div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>
