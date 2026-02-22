<?php require_once __DIR__ . '/../config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Click2Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            height: 100vh;
            background: url('<?php echo BASE_URL; ?>assets/images/img1.jpeg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Dark overlay */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.65);
        }

        /* Glass Card */
        .login-card {
            position: relative;
            z-index: 2;
            width: 400px;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(15px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            text-align: center;
            color: #fff;
        }

        .login-card h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-card p {
            font-size: 14px;
            margin-bottom: 25px;
            opacity: 0.8;
        }

        .login-card input {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            border-radius: 30px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            background: linear-gradient(90deg,#ff9f43,#ff5e62);
            color: #fff;
            transition: 0.3s;
        }

        .login-btn:hover {
            transform: scale(1.05);
        }

        .register-text {
            margin-top: 15px;
            font-size: 13px;
        }

        .register-text a {
            color: #ff9f43;
            text-decoration: none;
            font-weight: 600;
        }

        /* Mobile Responsive */
        @media (max-width: 480px) {
            .login-card {
                width: 90%;
                padding: 30px;
            }
        }

    </style>
</head>

<body>

    <div class="login-card">
        <h2>Click2Travel</h2>
        <p>Welcome Back</p>

        <form method="POST" action="?page=login">
            <input type="hidden" name="action" value="login">

            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="login-btn">Login Now</button>
        </form>

        <div class="register-text">
            Don’t have an account?
            <a href="?page=register">Register Now</a>
        </div>
    </div>

</body>
</html>