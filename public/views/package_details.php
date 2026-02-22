<?php require_once __DIR__ . '/../../config/config.php'; ?>
<?php require_once __DIR__ . '/../../app/helpers/auth_helper.php'; ?>
<?php require __DIR__ . '/layout/header.php'; ?>

    <title><?php echo htmlspecialchars($package['name']); ?></title>
</head>
<body>

<h2><?php echo htmlspecialchars($package['name']); ?></h2>

<img src="assets/images/<?php echo htmlspecialchars($package['image']); ?>" width="300">

<p><?php echo htmlspecialchars($package['description']); ?></p>

<p>Duration: <?php echo htmlspecialchars($package['duration']); ?></p>

<p>Price per person: ₹ <?php echo htmlspecialchars($package['price']); ?></p>

<hr>

<?php if (isset($_SESSION['user_id'])): ?>

<h3>Book This Package</h3>

<form method="POST" action="?page=book&id=<?php echo (int) $package['id']; ?>">

    <label>Number of Guests:</label>
    <input type="number" name="guests" min="1" required><br><br>

    <label>Arrival Date:</label>
    <input type="date" name="arrival_date" required><br><br>

    <button type="submit">Confirm Booking</button>
</form>

<?php else: ?>

<p>Please <a href="?page=login">login</a> to book.</p>

<?php endif; ?>

<br>
<a href="?page=packages">Back</a>
<?php require __DIR__ . '/layout/footer.php'; ?>