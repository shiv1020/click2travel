<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';
requireAdmin();

$countBookings = $countBookings ?? 0;
$countPackages = $countPackages ?? 0;
$countContacts = $countContacts ?? 0;
$countUsers = $countUsers ?? 0;
$countCancelRequests = $countCancelRequests ?? 0;
$packages = $packages ?? [];
$bookings = $bookings ?? [];

function package_tag_class($type) {
    $map = [
        'combo' => 'tag-combo',
        'adventurous' => 'tag-adventurous',
        'sea' => 'tag-sea',
        'foreign' => 'tag-foreign',
    ];
    $key = strtolower(trim($type ?? ''));
    return $map[$key] ?? 'tag-default';
}

function package_tag_label($type) {
    if (empty($type)) return 'TOUR';
    return strtoupper($type);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - OnlineTour</title>
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
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_dashboard" class="nav-item active">
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
            <!-- KPI Cards -->
            <section class="kpi-cards">
                <div class="kpi-card">
                    <span class="kpi-value"><?php echo (int) $countBookings; ?></span>
                    <span class="kpi-label">Bookings</span>
                </div>
                <div class="kpi-card">
                    <span class="kpi-value"><?php echo (int) $countPackages; ?></span>
                    <span class="kpi-label">Packages</span>
                </div>
                <div class="kpi-card kpi-accent-green">
                    <span class="kpi-value"><?php echo (int) $countContacts; ?></span>
                    <span class="kpi-label">Contact Requests</span>
                </div>
                <div class="kpi-card">
                    <span class="kpi-value"><?php echo (int) $countUsers; ?></span>
                    <span class="kpi-label">Users</span>
                </div>
                <div class="kpi-card kpi-accent-purple">
                    <span class="kpi-value"><?php echo (int) $countCancelRequests; ?></span>
                    <span class="kpi-label">Cancel Requests</span>
                </div>
            </section>

            <!-- Your Packages -->
            <section class="packages-section">
                <h2 class="section-title">Your Packages</h2>
                <div class="packages-grid">
                    <?php foreach ($packages as $pkg): ?>
                    <?php
                        $imgUrl = BASE_URL . 'assets/images/' . (isset($pkg['image']) && $pkg['image'] ? htmlspecialchars($pkg['image']) : 'placeholder.jpg');
                        $shortDesc = isset($pkg['description']) ? (strlen($pkg['description']) > 40 ? substr($pkg['description'], 0, 40) . '…' : $pkg['description']) : '';
                        $tagClass = package_tag_class($pkg['package_type'] ?? '');
                        $tagLabel = package_tag_label($pkg['package_type'] ?? '');
                    ?>
                    <div class="package-card">
                        <div class="package-card-image">
                            <img src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($pkg['name']); ?>">
                        </div>
                        <div class="package-card-meta">
                            <span class="package-likes"><i class="far fa-thumbs-up"></i> 0</span>
                            <span class="package-price">~₹<?php echo number_format((float)($pkg['price'] ?? 0)); ?></span>
                        </div>
                        <h3 class="package-card-title"><?php echo htmlspecialchars($pkg['name']); ?></h3>
                        <p class="package-card-desc"><?php echo htmlspecialchars($shortDesc); ?></p>
                        <p class="package-card-duration"><i class="far fa-clock"></i> <?php echo htmlspecialchars($pkg['duration'] ?? '—'); ?></p>
                        <span class="package-tag <?php echo $tagClass; ?>"><?php echo $tagLabel; ?></span>
                        <a href="<?php echo BASE_URL; ?>index.php?page=packages" class="package-edit-btn"><i class="fas fa-pencil"></i> Edit</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
