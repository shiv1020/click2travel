<?php require __DIR__ . '/layout/header.php'; ?>

<h2>My Bookings</h2>

<table border="1">
<tr>
    <th>Package</th>
    <th>Guests</th>
    <th>Total</th>
    <th>Receipt</th>
    <th>Status</th>
</tr>

<?php foreach ($bookings as $b): ?>
<tr>
    <td><?php echo htmlspecialchars($b['package_name']); ?></td>
    <td><?php echo $b['guests']; ?></td>
    <td>₹ <?php echo $b['total_amount']; ?></td>
    <td><?php echo $b['receipt_no']; ?></td>
    <td><?php echo $b['payment_status']; ?></td>
</tr>
<?php endforeach; ?>

</table>

<a href="?page=packages">Back</a>

<?php require __DIR__ . '/layout/footer.php'; ?>