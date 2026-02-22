<?php require __DIR__ . '/layout/header.php'; ?>

<section class="payment-page">

    <div class="payment-wrapper">

        <h2>Payment for <?php echo $booking['package_name']; ?></h2>
        <p>Total Amount: ₹<?php echo $booking['total_amount']; ?></p>

        <form method="POST" action="?page=process_payment">

            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">

            <div class="method-selection">
                <label>
                    <input type="radio" name="method" value="upi" checked>
                    UPI Payment
                </label>

                <label>
                    <input type="radio" name="method" value="card">
                    Card Payment
                </label>
            </div>

            <!-- UPI SECTION -->
            <div class="payment-section" id="upi-section">
                <label>UPI ID</label>
                <input type="text" name="upi_id" placeholder="example@upi">
            </div>

            <!-- CARD SECTION -->
            <div class="payment-section" id="card-section" style="display:none;">

                <label>Card Holder Name</label>
                <input type="text" name="card_holder">

                <label>Card Number</label>
                <input type="text" name="card_number">

                <label>Expiry Month</label>
                <input type="text" name="expiry_month">

                <label>Expiry Year</label>
                <input type="text" name="expiry_year">

            </div>

            <button type="submit" class="premium-btn">Pay Now</button>

        </form>

    </div>

</section>

<script>
document.querySelectorAll('input[name="method"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value === 'card') {
            document.getElementById('card-section').style.display = 'block';
            document.getElementById('upi-section').style.display = 'none';
        } else {
            document.getElementById('card-section').style.display = 'none';
            document.getElementById('upi-section').style.display = 'block';
        }
    });
});
</script>

<?php require __DIR__ . '/layout/footer.php'; ?>