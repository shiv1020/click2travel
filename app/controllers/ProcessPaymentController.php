
<?php

require_once __DIR__ . '/../core/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit;
}

$pdo = Database::getInstance()->getConnection();

$booking_id = intval($_POST['booking_id']);
$method = $_POST['method'];
$user_id = $_SESSION['user_id'];

/* =========================
   FETCH BOOKING
========================= */

$stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ?");
$stmt->execute([$booking_id]);
$booking = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$booking) {
    die("Invalid booking");
}

$amount = $booking['total_amount'];
$receipt_no = "RCPT" . time();

/* =========================
   INSERT INTO PAYMENTS
========================= */

$stmt = $pdo->prepare("
    INSERT INTO payments
    (booking_id, receipt_no, amount, payment_status)
    VALUES (?, ?, ?, ?)
");

$stmt->execute([
    $booking_id,
    $receipt_no,
    $amount,
    'paid'
]);

/* =========================
   IF CARD PAYMENT
========================= */

if ($method === 'card') {

    $card_holder = $_POST['card_holder'];
    $card_number = $_POST['card_number'];
    $expiry_month = $_POST['expiry_month'];
    $expiry_year = $_POST['expiry_year'];

    $last_four = substr($card_number, -4);
    $card_type = (substr($card_number, 0, 1) == "4") ? "Visa" : "MasterCard";

    $stmt = $pdo->prepare("
        INSERT INTO saved_payments
        (user_id, card_holder, last_four, card_type, expiry_month, expiry_year)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $user_id,
        $card_holder,
        $last_four,
        $card_type,
        $expiry_month,
        $expiry_year
    ]);
}

/* =========================
   UPDATE BOOKING STATUS
========================= */

$stmt = $pdo->prepare("
    UPDATE bookings SET status = 'confirmed' WHERE id = ?
");

$stmt->execute([$booking_id]);

header("Location: ?page=invoice&booking_id=" . $booking_id);
exit;