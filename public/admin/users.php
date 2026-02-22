<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';
requireAdmin();

$users = $users ?? [];
$currentUserId = $_SESSION['user_id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users - OnlineTour Admin</title>
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
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_contact" class="nav-item">
                <i class="fas fa-users"></i>
                <span>Contact</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_users" class="nav-item active">
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
            <h1 class="admin-page-title">All Users</h1>
            <div class="admin-table-card">
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $i => $u): ?>
                            <?php $isCurrentUser = ((int)($u['id'] ?? 0)) === ((int)$currentUserId); ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo htmlspecialchars($u['name'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($u['email'] ?? '—'); ?></td>
                                <td>••••••••</td>
                                <td class="admin-table-actions">
                                    <span class="user-role-badge"><?php echo htmlspecialchars($u['role'] ?? 'user'); ?></span>
                                    <?php if (!$isCurrentUser): ?>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=admin_update_user_role&id=<?php echo (int)$u['id']; ?>&role=admin" class="action-role">Admin</a>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=admin_update_user_role&id=<?php echo (int)$u['id']; ?>&role=user" class="action-role">User</a>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=admin_delete_user&id=<?php echo (int)$u['id']; ?>" class="action-delete" onclick="return confirm('Delete this user?');">Delete</a>
                                    <?php else: ?>
                                    <span class="action-disabled">(you)</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($users)): ?>
                            <tr>
                                <td colspan="5" class="admin-table-empty">No users found.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
