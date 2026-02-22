<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/helpers/auth_helper.php';

requireAdmin();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/admin.css">
</head>
<body>

<h2>Admin Dashboard</h2>

<table border="1">
<tr>
    <th>User</th>
    <th>Package</th>
    <th>Guests</th>
    <th>Total</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php foreach ($bookings as $b): ?>
<tr>
    <td><?php echo htmlspecialchars($b['user_name']); ?></td>
    <td><?php echo htmlspecialchars($b['package_name']); ?></td>
    <td><?php echo $b['guests']; ?></td>
    <td>₹ <?php echo $b['total_amount']; ?></td>
    <td><?php echo $b['status']; ?></td>
    <td>
        <a href="?page=approve_booking&id=<?php echo $b['id']; ?>">Approve</a>
    </td>
</tr>
<?php endforeach; ?>

</table>

<br>
<a href="?page=home">Back to Home</a>

</body>
</html>