<?php require __DIR__ . '/layout/header.php'; ?>

<section class="invoice-page">

    <div class="invoice-box">

        <div class="invoice-header">
            <h1>GTravel</h1>
            <span>Receipt No: <?php echo $invoice['receipt_no']; ?></span>
        </div>

        <div class="invoice-details">

            <div class="row">
                <strong>Package:</strong> <?php echo $invoice['package_name']; ?>
            </div>

            <div class="row">
                <strong>Guests:</strong> <?php echo $invoice['guests']; ?>
            </div>

            <div class="row">
                <strong>Duration:</strong> <?php echo $invoice['duration']; ?>
            </div>

            <div class="row">
                <strong>Price per Person:</strong> ₹<?php echo $invoice['price']; ?>
            </div>

            <div class="row highlight">
                <strong>Total Paid:</strong> ₹<?php echo $invoice['total_amount']; ?>
            </div>

            <div class="row">
                <strong>Payment Status:</strong> <?php echo strtoupper($invoice['payment_status']); ?>
            </div>

        </div>

        <div class="invoice-footer">
            <button onclick="window.print()" class="download-btn">
                Download Invoice
            </button>
        </div>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>