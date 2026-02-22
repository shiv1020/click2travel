<?php

require_once __DIR__ . '/../core/Database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ?page=login");
    exit;
}

$pdo = Database::getInstance()->getConnection();

$receipt = $_GET['receipt'] ?? '';

$stmt = $pdo->prepare("
    SELECT b.*, 
           p.name AS package_name,
           p.duration,
           p.price,
           pay.receipt_no,
           pay.payment_status
    FROM payments pay
    JOIN bookings b ON pay.booking_id = b.id
    JOIN packages p ON b.package_id = p.id
    WHERE pay.receipt_no = ? AND b.user_id = ?
");

$stmt->execute([$receipt, $_SESSION['user_id']]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    die("Invoice not found");
}

/* ================================
   FORCE DOWNLOAD AS HTML FILE
================================ */

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=Invoice_" . $receipt . ".html");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice <?= $receipt ?></title>
    <style>
        body { font-family: Arial; padding: 30px; }
        .box { border:1px solid #ddd; padding:30px; }
        h1 { color:#ff6600; }
        .row { margin:10px 0; }
        .total { font-size:18px; font-weight:bold; margin-top:20px; }
    </style>
</head>
<body>

<div class="box">

<h1>GTravel Invoice</h1>
<p><strong>Receipt No:</strong> <?= $invoice['receipt_no'] ?></p>

<hr>

<div class="row"><strong>Package:</strong> <?= $invoice['package_name'] ?></div>
<div class="row"><strong>Guests:</strong> <?= $invoice['guests'] ?></div>
<div class="row"><strong>Duration:</strong> <?= $invoice['duration'] ?></div>
<div class="row"><strong>Price Per Person:</strong> ₹<?= $invoice['price'] ?></div>

<div class="total">
Total Paid: ₹<?= $invoice['total_amount'] ?>
</div>

<hr>

<p>Status: <?= strtoupper($invoice['payment_status']) ?></p>
<p>Date: <?= $invoice['created_at'] ?></p>

</div>

</body>
</html>