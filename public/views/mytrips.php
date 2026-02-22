<?php require __DIR__ . '/layout/header.php'; ?>

<section class="trips-hero">

    <div class="overlay"></div>

    <div class="trips-container">

        <h1>My Trips</h1>
        <p>Check And Manage Your Bookings Easily</p>

        <!-- SEARCH -->
        <form method="GET" class="search-box">
            <input type="hidden" name="page" value="mytrips">
            <input type="text" name="receipt" placeholder="Enter Your Receipt Number...">
            <button type="submit">Search</button>
        </form>

        <!-- TABLE -->
        <div class="trips-table">
            <table>
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Receipt</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $b): ?>
                        <tr>
                            <td><?= htmlspecialchars($b['package_name']) ?></td>
                            <td><?= htmlspecialchars($b['user_name']) ?></td>
                            <td><?= htmlspecialchars($b['email']) ?></td>
                            <td><?= htmlspecialchars($b['receipt_no'] ?? '-') ?></td>
                            <td>₹ <?= htmlspecialchars($b['amount'] ?? '0') ?></td>
                            <td>
                                <?php if(($b['payment_status'] ?? '') === 'Paid'): ?>
                                    <span class="status paid">Paid</span>
                                <?php else: ?>
                                    <span class="status pending">Pending</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No bookings found.</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>