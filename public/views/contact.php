<?php require __DIR__ . '/layout/header.php'; ?>

<section class="contact-hero">

    <div class="contact-overlay"></div>

    <div class="contact-container">

        <!-- LEFT SIDE -->
        <div class="contact-info">
            <h1>Let’s Plan Your Next Journey</h1>
            <p>
                Have Questions Or Need A Customized Travel Plan?
                Our Experts Are Here To Help You.
            </p>

            <div class="info-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h4>Our Address</h4>
                    <p>201, MG Road Lane 1, Thane, India</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-phone"></i>
                <div>
                    <h4>Call Us</h4>
                    <p>+91 7878787878</p>
                </div>
            </div>

            <div class="info-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <h4>Email</h4>
                    <p>contact@click2travel.com</p>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE FORM -->
        <div class="contact-form">
            <h3>Send Us A Message</h3>

            <form method="POST" action="?page=send_message">

                <div class="form-row">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>

                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="phone" placeholder="Phone Number" required>

                <textarea name="message" placeholder="Write Your Message Here..." required></textarea>

                <button type="submit" class="contact-btn">
                    Send Message
                </button>

            </form>
        </div>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>