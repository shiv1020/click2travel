<?php require __DIR__ . '/layout/header.php'; ?>

<section class="packages-page">

    <h1>All Available Packages</h1>
    <p>Discover handcrafted journeys crafted for unforgettable experiences.</p>

    <div class="packages-container">

        <!-- FILTER SIDEBAR -->
        <div class="filter-box">
            <form method="GET">
                <input type="hidden" name="page" value="packages">
                 <div class="search-section">
        <input type="text" 
               name="search" 
               placeholder="Search package name..."
               value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">

        <button type="submit" class="search-btn">
            Search
        </button>
</div>

                <h3>Filter</h3>

                

                <label>Max Price</label>
                <input type="number" name="price" placeholder="Enter max price">

                <label>Trip Days</label>
                <input type="text" name="days" placeholder="e.g. 5 Days">

                <label>Category</label>
                <select name="category">
                    <option value="">All</option>
                    <option value="foreign">Foreign Tours</option>
                    <option value="adventurous">Adventurous Tours</option>
                    <option value="religious">Religious Packages</option>
                    <option value="sea">Cruise Packages</option>
                    <option value="combo">Combo Packages</option>
                </select>

                <button type="submit">Apply Filter</button>
            </form>
        </div>

        <!-- PACKAGES GRID -->
        <div class="packages-grid">

            <?php foreach ($packages as $pkg): ?>

                <div class="pkg-card">

                    <div class="pkg-img"
                         style="background-image:url('<?php echo BASE_URL; ?>assets/images/<?php echo htmlspecialchars($pkg['image']); ?>')">

                        <span class="pkg-price">₹ <?php echo $pkg['price']; ?></span>
                    </div>

                    <div class="pkg-body">
                        <h3><?php echo $pkg['name']; ?></h3>

                        <ul>
                            <li><?php echo $pkg['duration']; ?></li>
                            <li><?php echo $pkg['travel_mode'] ?? 'Hotel / Meal'; ?></li>
                            <li>Free Cancellation</li>
                        </ul>

                        <a href="?page=book&id=<?php echo $pkg['id']; ?>" class="pkg-btn">
                            Book Now
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>