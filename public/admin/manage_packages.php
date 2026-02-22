<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';
requireAdmin();

$packages = $packages ?? [];
$editPackage = $editPackage ?? null;
$isEdit = !empty($editPackage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages - OnlineTour Admin</title>
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
            <a href="<?php echo BASE_URL; ?>index.php?page=admin_manage_packages" class="nav-item active">
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
            <!-- Add New Package Form -->
            <section class="admin-form-card">
                <h2 class="admin-form-title"><?php echo $isEdit ? 'Update Package' : 'Add New Package'; ?></h2>
                <form action="<?php echo BASE_URL; ?>index.php?page=<?php echo $isEdit ? 'admin_update_package' : 'admin_add_package'; ?>" method="post" enctype="multipart/form-data" class="admin-package-form">
                    <?php if ($isEdit): ?>
                    <input type="hidden" name="id" value="<?php echo (int)$editPackage['id']; ?>">
                    <?php endif; ?>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Select Package Type</label>
                        <select name="package_type" class="admin-form-input" required>
                            <option value="">Choose Package Type</option>
                            <option value="combo" <?php echo ($editPackage['package_type'] ?? '') === 'combo' ? 'selected' : ''; ?>>Combo</option>
                            <option value="adventurous" <?php echo ($editPackage['package_type'] ?? '') === 'adventurous' ? 'selected' : ''; ?>>Adventurous</option>
                            <option value="foreign" <?php echo ($editPackage['package_type'] ?? '') === 'foreign' ? 'selected' : ''; ?>>Foreign</option>
                            <option value="sea" <?php echo ($editPackage['package_type'] ?? '') === 'sea' ? 'selected' : ''; ?>>Sea</option>
                        </select>
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Package Name</label>
                        <input type="text" name="name" class="admin-form-input" placeholder="Enter package name" value="<?php echo htmlspecialchars($editPackage['name'] ?? ''); ?>" required>
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Travel Mode</label>
                        <input type="text" name="travel_mode" class="admin-form-input" placeholder="Flight / Train / Bus" value="<?php echo htmlspecialchars($editPackage['travel_mode'] ?? ''); ?>">
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Package Price</label>
                        <input type="number" name="price" class="admin-form-input" placeholder="Enter price" step="0.01" min="0" value="<?php echo htmlspecialchars($editPackage['price'] ?? ''); ?>" required>
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Duration</label>
                        <input type="text" name="duration" class="admin-form-input" placeholder="7 Nights / 8 Days" value="<?php echo htmlspecialchars($editPackage['duration'] ?? '7 Nights / 8 Days'); ?>">
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Package Description</label>
                        <textarea name="description" class="admin-form-input admin-form-textarea" placeholder="Enter detailed package description" rows="4"><?php echo htmlspecialchars($editPackage['description'] ?? ''); ?></textarea>
                    </div>
                    <div class="admin-form-row">
                        <label class="admin-form-label">Package image</label>
                        <input type="file" name="image" class="admin-form-file" accept="image/jpeg,image/png,image/gif,image/webp">
                        <?php if ($isEdit && !empty($editPackage['image'])): ?>
                        <span class="admin-form-hint">Current: <?php echo htmlspecialchars($editPackage['image']); ?> (leave empty to keep)</span>
                        <?php endif; ?>
                    </div>
                    <div class="admin-form-row admin-form-actions">
                        <button type="submit" class="admin-btn-add"><?php echo $isEdit ? 'Update Package' : 'Add Package'; ?></button>
                        <?php if ($isEdit): ?>
                        <a href="<?php echo BASE_URL; ?>index.php?page=admin_manage_packages" class="admin-btn-cancel">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </section>

            <!-- Packages List Table -->
            <section class="admin-packages-list">
                <div class="admin-table-card">
                    <div class="admin-table-wrap">
                        <table class="admin-table admin-table-packages">
                            <thead>
                                <tr>
                                    <th>Package image</th>
                                    <th>Package name</th>
                                    <th>Package price</th>
                                    <th>Package Duration</th>
                                    <th>Package Type</th>
                                    <th>Package Description</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($packages as $pkg): ?>
                                <?php
                                    $imgUrl = !empty($pkg['image'])
                                        ? BASE_URL . 'assets/images/' . htmlspecialchars($pkg['image'])
                                        : BASE_URL . 'assets/images/placeholder.jpg';
                                    $shortDesc = !empty($pkg['description'])
                                        ? (strlen($pkg['description']) > 30 ? substr($pkg['description'], 0, 30) . '…' : $pkg['description'])
                                        : '—';
                                ?>
                                <tr>
                                    <td class="admin-table-img-cell">
                                        <img src="<?php echo $imgUrl; ?>" alt="" class="admin-table-thumb">
                                    </td>
                                    <td><?php echo htmlspecialchars($pkg['name']); ?></td>
                                    <td>Rs.<?php echo number_format((float)$pkg['price']); ?>/-</td>
                                    <td><?php echo htmlspecialchars($pkg['duration'] ?? '—'); ?></td>
                                    <td><?php echo htmlspecialchars($pkg['package_type'] ?? '—'); ?></td>
                                    <td><?php echo htmlspecialchars($shortDesc); ?></td>
                                    <td class="admin-table-actions">
                                        <a href="<?php echo BASE_URL; ?>index.php?page=admin_manage_packages&edit=<?php echo (int)$pkg['id']; ?>" class="action-update">update</a>
                                        <a href="<?php echo BASE_URL; ?>index.php?page=admin_delete_package&id=<?php echo (int)$pkg['id']; ?>" class="action-delete" onclick="return confirm('Delete this package?');">delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($packages)): ?>
                                <tr>
                                    <td colspan="7" class="admin-table-empty">No packages yet. Add one above.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
