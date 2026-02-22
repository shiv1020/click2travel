<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
</head>
<body>
    <style>
        body {
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f9855f; /* Orange background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.thankyou-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.thankyou-card {
    background: white;
    width: 70%;
    max-width: 900px;
    padding: 60px;
    border-radius: 20px;
    text-align: center;
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.thankyou-card h1 {
    margin-bottom: 20px;
    font-size: 32px;
}

.thankyou-card p {
    color: #555;
    font-size: 16px;
    margin-bottom: 40px;
}

.home-btn {
    display: inline-block;
    padding: 14px 35px;
    background: black;
    color: white;
    text-decoration: none;
    border-radius: 30px;
    font-size: 14px;
    transition: 0.3s;
}

.home-btn:hover {
    background: #333;
}
    </style>

    <div class="thankyou-wrapper">
        <div class="thankyou-card">
            <h1>Thank You!</h1>
            <p>
                Your message has been successfully sent. Our travel experts will contact you shortly.
            </p>

            <a href="?page=home" class="home-btn">Back To Home</a>
        </div>
    </div>

</body>
</html>