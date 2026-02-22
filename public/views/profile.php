<?php require __DIR__ . '/layout/header.php'; ?>

<section class="profile-section">

<div class="profile-container">

    <!-- LEFT CARD -->
    <div class="profile-card">
        <h3><?= htmlspecialchars($user['name']) ?></h3>
        <p><?= htmlspecialchars($user['email']) ?></p>
        <p><?= htmlspecialchars($user['phone']) ?></p>
        <small>Member Since: <?= date('F Y', strtotime($user['created_at'])) ?></small>
    </div>

    <!-- RIGHT SIDE -->
    <div class="profile-content">

        <div class="tabs">
            <button onclick="openTab('overview')">Overview</button>
            <button onclick="openTab('trips')">My Trips</button>
            <button onclick="openTab('payments')">Saved Payments</button>
            <button onclick="openTab('invoices')">Invoices</button>
        </div>

        <!-- OVERVIEW -->
        <div id="overview" class="tab-content active">
            <div class="stats-grid">
                <div>Total Trips<br><strong><?= $stats['total_trips'] ?? 0 ?></strong></div>
                <div>Completed<br><strong><?= $stats['completed_trips'] ?? 0 ?></strong></div>
                <div>Upcoming<br><strong><?= $stats['upcoming_trips'] ?? 0 ?></strong></div>
                <div>Total Spent<br><strong>₹ <?= $stats['total_spent'] ?? 0 ?></strong></div>
            </div>
        </div>

        <!-- MY TRIPS -->
        <div id="trips" class="tab-content">
            <?php foreach($recentBookings as $b): ?>
                <div class="booking-item">
                    <?= htmlspecialchars($b['package_name']) ?>
                    - ₹ <?= $b['amount'] ?? 0 ?>
                    - <?= $b['payment_status'] ?? 'Pending' ?>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- SAVED PAYMENTS -->
        <div id="payments" class="tab-content">
            <?php if($savedPayments): ?>
                <?php foreach($savedPayments as $sp): ?>
                    <div class="payment-card">
                        <?= $sp['card_type'] ?> **** <?= $sp['last_four'] ?>
                        (<?= $sp['expiry_month'] ?>/<?= $sp['expiry_year'] ?>)
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No saved payment methods.</p>
            <?php endif; ?>
        </div>

        <!-- INVOICES -->
        <div id="invoices" class="tab-content">
            <?php foreach($recentBookings as $b): ?>
                <?php if(!empty($b['receipt_no'])): ?>
                    <div class="invoice-item">
                       <?= htmlspecialchars($b['package_name']) ?>

                        <a href="?page=download_invoice&receipt=<?= $b['receipt_no'] ?>">
                            Download Invoice
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
</div>
</section>

<script>
function openTab(tabId){
    document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
}
</script>

<?php require __DIR__ . '/layout/footer.php'; ?>