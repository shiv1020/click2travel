<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';
requireAdmin();

$bookings = $bookings ?? [];
$countPending = $countPending ?? 0;
$countConfirmed = $countConfirmed ?? 0;
$countCancelled = $countCancelled ?? 0;
$countPaymentsPaid = $countPaymentsPaid ?? 0;
$countPaymentsRequested = $countPaymentsRequested ?? 0;
$countPaymentsFailed = $countPaymentsFailed ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking & Payment Status - OnlineTour Admin</title>
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
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_users" class="nav-item">
                <i class="fas fa-user"></i>
                <span>Users</span>
            </a>
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_status" class="nav-item active">
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
            <h1 class="admin-page-title">Booking & Payment Status</h1>

            <!-- Status KPI Cards -->
            <section class="kpi-cards status-kpi" style="margin-bottom: 32px;">
                <div class="kpi-card">
                    <span class="kpi-value"><?php echo (int) $countPending; ?></span>
                    <span class="kpi-label">Pending Bookings</span>
                </div>
                <div class="kpi-card kpi-accent-green">
                    <span class="kpi-value"><?php echo (int) $countConfirmed; ?></span>
                    <span class="kpi-label">Confirmed</span>
                </div>
                <div class="kpi-card kpi-accent-purple">
                    <span class="kpi-value"><?php echo (int) $countCancelled; ?></span>
                    <span class="kpi-label">Cancelled</span>
                </div>
                <div class="kpi-card">
                    <span class="kpi-value"><?php echo (int) $countPaymentsRequested; ?></span>
                    <span class="kpi-label">Payments Pending</span>
                </div>
                <div class="kpi-card kpi-accent-green">
                    <span class="kpi-value"><?php echo (int) $countPaymentsPaid; ?></span>
                    <span class="kpi-label">Payments Paid</span>
                </div>
                <div class="kpi-card" style="border-left-color: #f87171;">
                    <span class="kpi-value"><?php echo (int) $countPaymentsFailed; ?></span>
                    <span class="kpi-label">Payments Failed</span>
                </div>
            </section>

            <!-- Status Table -->
            <div class="admin-table-card">
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
                                <th>Package</th>
                                <th>Guests</th>
                                <th>Arrival Date</th>
                                <th>Booking Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bookings as $i => $b): ?>
                            <?php
                                $bStatus = strtolower(trim($b['booking_status'] ?? ''));
                                $pStatus = strtolower(trim($b['payment_status'] ?? ''));
                                $bStatusClass = in_array($bStatus, ['pending','confirmed','cancelled']) ? $bStatus : 'pending';
                                $pStatusClass = in_array($pStatus, ['requested','paid','failed']) ? $pStatus : 'requested';
                            ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo htmlspecialchars($b['user_name'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($b['package_name'] ?? '—'); ?></td>
                                <td><?php echo (int)($b['guests'] ?? 0); ?></td>
                                <td><?php echo htmlspecialchars($b['arrival_date'] ?? '—'); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo $bStatusClass; ?>"><?php echo htmlspecialchars(ucfirst($bStatus ?: '—')); ?></span>
                                </td>
                                <td>
                                    <span class="status-badge status-<?php echo $pStatusClass; ?>"><?php echo htmlspecialchars(ucfirst($pStatus ?: '—')); ?></span>
                                </td>
                                <td class="admin-table-actions">
                                    <?php if ($bStatus === 'pending'): ?>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=approve_booking&id=<?php echo (int)$b['id']; ?>" class="action-update">Approve</a>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=admin_cancel_booking&id=<?php echo (int)$b['id']; ?>" class="action-delete" onclick="return confirm('Cancel this booking?');">Cancel</a>
                                    <?php elseif ($bStatus === 'confirmed'): ?>
                                    <a href="<?php echo BASE_URL; ?>index.php?page=admin_cancel_booking&id=<?php echo (int)$b['id']; ?>" class="action-delete" onclick="return confirm('Cancel this booking?');">Cancel</a>
                                    <?php else: ?>
                                    <span class="action-disabled">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php if (empty($bookings)): ?>
                            <tr>
                                <td colspan="8" class="admin-table-empty">No bookings found.</td>
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
