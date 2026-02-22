<?php require __DIR__ . '/layout/header.php'; ?>

<section class="premium-booking">

    <div class="booking-wrapper">

        <h2>Complete Your Booking</h2>

        <form method="POST" action="?page=book&id=<?php echo $package['id']; ?>">

            <div class="form-grid">

                <div>
                    <label>Package Name</label>
                    <input type="text" value="<?php echo htmlspecialchars($package['name']); ?>" readonly>
                </div>

                <div>
                    <label>Per Guest (₹)</label>
                    <input type="text" value="<?php echo $package['price']; ?>" readonly>
                </div>

                <div>
                    <label>Full Name</label>
                    <input type="text" name="full_name" required>
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" required>
                </div>

                <div>
                    <label>Address</label>
                    <input type="text" name="address" required>
                </div>

                <div>
                    <label>Origin (Pick-up)</label>
                    <input type="text" name="origin" required>
                </div>

                <div>
                    <label>No of Guests</label>
                    <input type="number" name="guests" min="1" required>
                </div>

                <div>
                    <label>Start Date</label>
                    <input type="date" name="arrival_date" required>
                </div>

                <div>
                    <label>Duration</label>
                    <input type="text" value="<?php echo htmlspecialchars($package['duration']); ?>" readonly>
                </div>

            </div>

            <button type="submit" name="confirm_booking" class="premium-btn">
                Confirm Booking
            </button>

        </form>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>