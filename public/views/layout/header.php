<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Click2Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>

<header class="main-header">
    <div class="nav-container">

    <div class="logo">
        Click<span>2</span>travel
    </div>

    <div class="menu-toggle">
    <i class="fas fa-bars"></i>
</div>

    <nav class="nav-menu">
        <a href="?page=home">HOME</a>
        <a href="?page=about">ABOUT US</a>
        <a href="?page=packages">PACKAGES</a>
        <a href="?page=contact">CONTACT</a>
        <a href="?page=mytrips">MYTRIPS</a>
    </nav>

    <!-- RIGHT SIDE -->
    <!-- RIGHT SIDE -->
<div class="nav-right">
    <?php if(isset($_SESSION['user_id'])): ?>
        
        <a href="?page=profile" class="user-btn">
            <i class="fas fa-user"></i>
            <?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </a>

        <?php if(isset($_GET['page']) && $_GET['page'] === 'profile'): ?>
        <a href="?page=logout" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    <?php endif; ?>    

    <?php else: ?>
        <a href="?page=login" class="auth-link">Login</a>
        <a href="?page=register" class="auth-link">Register</a>
    <?php endif; ?>
</div>

</div>
</header>
<script>
document.querySelector('.menu-toggle').addEventListener('click', function() {
    document.querySelector('.nav-menu').classList.toggle('active');
});
</script>
<div class="container">