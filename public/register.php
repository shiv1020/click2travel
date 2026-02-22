<?php require_once __DIR__ . '/../config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register - Click2Travel</title>
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
            background: url('<?php echo BASE_URL; ?>assets/images/img2.jpeg') no-repeat center center/cover;
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
        .register-card {
            position: relative;
            z-index: 2;
            width: 420px;
            padding: 45px;
            border-radius: 25px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(18px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
            text-align: center;
            color: #fff;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .register-card h2 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .register-card h3 {
            font-size: 20px;
            margin-bottom: 30px;
            font-weight: 500;
        }

        .register-card input {
            width: 100%;
            padding: 14px 20px;
            margin-bottom: 18px;
            border-radius: 40px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            border-radius: 40px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            background: linear-gradient(90deg,#ff9f43,#ff5e62);
            color: #fff;
            transition: 0.3s ease;
        }

        .register-btn:hover {
            transform: scale(1.05);
        }

        .login-text {
            margin-top: 18px;
            font-size: 14px;
        }

        .login-text a {
            color: #ff9f43;
            text-decoration: none;
            font-weight: 600;
        }

        /* Mobile */
        @media (max-width: 480px) {
            .register-card {
                width: 90%;
                padding: 30px;
            }
        }

    </style>
</head>

<body>

    <div class="register-card">
        <h2>Click<span style="color:#ff9f43;">2</span>Travel</h2>
        <h3>Create Account</h3>

<form method="POST" action="<?php echo BASE_URL; ?>index.php?page=register">
    <input type="hidden" name="action" value="register">

    <input type="text" name="name" placeholder="Enter your name" required>
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="password" name="confirm_password" placeholder="Confirm password" required>

    <button type="submit" class="register-btn">Register Now</button>
</form>

        <div class="login-text">
            Already have an account?
            <a href="?page=login">Login Now</a>
        </div>
    </div>

</body>
</html>