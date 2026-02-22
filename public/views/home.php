

<!-- HOME SLIDER SECTION -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

<?php require __DIR__ . '/layout/header.php'; ?>

<section class="hero-slider">

    <div class="slide active" style="background-image:url('<?php echo BASE_URL; ?>assets/images/img1.jpeg')">
        <div class="overlay"></div>
        <div class="content">
            <span>EXPLORE • DISCOVER • TRAVEL</span>
            <h1>DISCOVER THE NEW PLACE</h1>
            <a href="?page=packages" class="hero-btn">Discover More</a>
        </div>
    </div>

    <div class="slide " style="background-image:url('<?php echo BASE_URL; ?>assets/images/img2.jpeg')">
        <div class="overlay"></div>
        <div class="content">
            <span>EXPLORE • DISCOVER • TRAVEL</span>
            <h1>TRAVEL AROUND THE WORLD</h1>
            <a href="?page=packages" class="hero-btn">Discover More</a>
        </div>
    </div>

    <div class="slide" style="background-image:url('<?php echo BASE_URL; ?>assets/images/img3.jpeg')">
        <div class="overlay"></div>
        <div class="content">
            <span>EXPLORE • DISCOVER • TRAVEL</span>
            <h1>MAKE YOUR JOURNEY SPECIAL</h1>
            <a href="?page=packages" class="hero-btn">Discover More</a>
        </div>
    </div>

    <div class="slide" style="background-image:url('<?php echo BASE_URL; ?>assets/images/img4.jpeg')">
        <div class="overlay"></div>
        <div class="content">
            <span>EXPLORE • DISCOVER • TRAVEL</span>
            <h1>CREATE BEAUTIFUL MEMORIES</h1>
            <a href="?page=packages" class="hero-btn">Discover More</a>
        </div>
    </div>

    <!-- Arrows -->
    <div class="arrow left">&#10094;</div>
    <div class="arrow right">&#10095;</div>

</section>
<!-- ================= PREMIUM SERVICES ================= -->

<section class="services-premium">

    <h2 class="services-title">OUR SERVICES</h2>

    <div class="services-wrapper">

        

        <div class="services-container">

            <div class="service-card active">
                <i class="fas fa-briefcase"></i>
                <h3>CORPORATE<br>TRAVEL</h3>
            </div>

            <div class="service-card">
                <i class="fas fa-globe"></i>
                <h3>OUTBOUND<br>HOLIDAYS</h3>
            </div>

            <div class="service-card">
                <i class="fas fa-bus"></i>
                <h3>INBOUND<br>TOURS</h3>
            </div>

            <div class="service-card">
                <i class="fas fa-mosque"></i>
                <h3>UMRAH & HAJJ<br>PACKAGES</h3>
            </div>

        </div>

       

    </div>

    <p class="services-desc">
        We provide premium travel solutions including corporate travel,
        international holidays, inbound tours and religious packages.
        Our expert team ensures seamless travel experiences.
    </p>

    <a href="?page=packages" class="know-btn">Know More</a>

</section>
<!-- ================= PREMIUM ABOUT SECTION ================= -->

<section class="premium-about">

    <div class="about-container">

        <!-- LEFT IMAGE -->
        <div class="about-image">
            <img src="<?php echo BASE_URL; ?>assets/images/aboutimg.jpg" alt="About Image">
        </div>

        <!-- RIGHT CONTENT -->
        <div class="about-content">
            <span class="about-subtitle">ABOUT OUR COMPANY</span>
            <h2>Creating Memorable Travel Experiences</h2>

            <p>
                We are a passionate team of travel experts dedicated to delivering
                exceptional journeys. Our mission is to help you explore the world
                with comfort, safety, and unforgettable memories.
            </p>

            <!-- STATS -->
            <div class="about-stats">
                <div>
                    <h3>10+</h3>
                    <span>Years Experience</span>
                </div>

                <div>
                    <h3>5K+</h3>
                    <span>Happy Clients</span>
                </div>

                <div>
                    <h3>100+</h3>
                    <span>Destinations</span>
                </div>
            </div>

            <a href="?page=about" class="about-btn">Read More</a>
        </div>

    </div>

</section>
<!-- ================= PREMIUM PACKAGES ================= -->

<section class="premium-packages">

    <div class="section-header">
        <span class="subtitle">TOP CATEGORIES</span>
        <h2>Explore Our Travel Packages</h2>
    </div>

    <div class="packages-grid">

        <a href="?page=foreign" class="package-card"
           style="background-image:url('<?php echo BASE_URL; ?>assets/images/img1.jpeg')">
            <div class="overlay"></div>
            <div class="content">
                <h3>Foreign Tours</h3>
            </div>
        </a>

        <a href="?page=adventure" class="package-card"
           style="background-image:url('<?php echo BASE_URL; ?>assets/images/img2.jpeg')">
            <div class="overlay"></div>
            <div class="content">
                <h3>Adventurous Tours</h3>
            </div>
        </a>

        <a href="?page=religious" class="package-card"
           style="background-image:url('<?php echo BASE_URL; ?>assets/images/img3.jpeg')">
            <div class="overlay"></div>
            <div class="content">
                <h3>Religious Packages</h3>
            </div>
        </a>

        <a href="?page=cruise" class="package-card"
           style="background-image:url('<?php echo BASE_URL; ?>assets/images/img4.jpeg')">
            <div class="overlay"></div>
            <div class="content">
                <h3>Cruise Packages</h3>
            </div>
        </a>

        <a href="?page=combo" class="package-card"
           style="background-image:url('<?php echo BASE_URL; ?>assets/images/img2.jpeg')">
            <div class="overlay"></div>
            <div class="content">
                <h3>Combo Packages</h3>
            </div>
        </a>

        <!-- EXPLORE ALL CARD -->
        <a href="?page=packages" class="package-card explore-all">
            <div class="content center">
                <h3>Explore All</h3>
            </div>
        </a>

    </div>

</section>



<?php require __DIR__ . '/layout/footer.php'; ?>

<script>
const slides = document.querySelectorAll(".slide");
const next = document.querySelector(".arrow.right");
const prev = document.querySelector(".arrow.left");

let index = 0;

function showSlide(i) {
    slides.forEach(slide => slide.classList.remove("active"));
    slides[i].classList.add("active");
}

function nextSlide() {
    index++;
    if (index >= slides.length) index = 0;
    showSlide(index);
}

function prevSlide() {
    index--;
    if (index < 0) index = slides.length - 1;
    showSlide(index);
}

next.addEventListener("click", nextSlide);
prev.addEventListener("click", prevSlide);

// Auto slide every 3 seconds
setInterval(nextSlide, 5000);
</script>

<script>
const serviceCards = document.querySelectorAll(".service-card");

serviceCards.forEach(card => {
    card.addEventListener("click", () => {
        serviceCards.forEach(c => c.classList.remove("active"));
        card.classList.add("active");
    });
});
</script>