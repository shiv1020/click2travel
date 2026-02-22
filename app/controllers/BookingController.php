<?php

require_once __DIR__ . '/../models/Package.php';
require_once __DIR__ . '/../models/Booking.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit;
}

$packageModel = new Package();
$bookingModel = new Booking();

$package_id = intval($_GET['id'] ?? 0);

$package = $packageModel->findById($package_id);

if (!$package) {
    die("Package not found");
}

/* ===============================
   HANDLE BOOKING
================================= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $guests = intval($_POST['guests']);
    $arrival_date = $_POST['arrival_date'];

    if ($guests <= 0) {
        die("Invalid guest number");
    }

    $total_amount = $guests * $package['price'];

    $booking_id = $bookingModel->createAndReturnId([
        'user_id'      => $_SESSION['user_id'],
        'package_id'   => $package_id,
        'guests'       => $guests,
        'arrival_date' => $arrival_date,
        'status'       => 'pending',
        'total_amount' => $total_amount
    ]);

    header("Location: ?page=payment&booking_id=" . $booking_id);
    exit;
}

require __DIR__ . '/../../public/views/book.php';