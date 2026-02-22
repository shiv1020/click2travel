<?php

require_once __DIR__ . '/../config/config.php';

/*
|--------------------------------------------------------------------------
| Handle POST Requests FIRST
|--------------------------------------------------------------------------
| Important: Route POST requests based on page
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $page = $_GET['page'] ?? '';

    switch ($page) {

        case 'send_message':
            require_once __DIR__ . '/../app/controllers/ContactController.php';
            break;

        case 'login':
        case 'register':
            require_once __DIR__ . '/../app/controllers/AuthController.php';
            break;

        case 'book':  // ✅ ALLOW BOOKING POST
            require_once __DIR__ . '/../app/controllers/BookingController.php';
            break;

        case 'process_payment':  // ✅ ALLOW PAYMENT POST
            require_once __DIR__ . '/../app/controllers/ProcessPaymentController.php';
            break;

        default:
            die("Invalid POST request");
    }

    exit;
}

/*
|--------------------------------------------------------------------------
| Handle GET Requests
|--------------------------------------------------------------------------
*/

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'home':
        require __DIR__ . '/views/home.php';
        break;

    case 'packages':
        require_once __DIR__ . '/../app/controllers/PackageController.php';
        break;

    case 'login':
        require __DIR__ . '/login.php';
        break;

    case 'register':
        require __DIR__ . '/register.php';
        break;

    case 'logout':
        require __DIR__ . '/logout.php';
        break;
case 'mytrips':
        require_once __DIR__ . '/../app/controllers/MyTripsController.php';
        break;


    case 'admin_dashboard':
        require_once __DIR__ . '/../app/controllers/AdminController.php';
        break;

    case 'approve_booking':
        require_once __DIR__ . '/../app/controllers/ApproveBookingController.php';
        break;

  

    case 'about':
        require __DIR__ . '/views/about.php';
        break;

    case 'contact':
        require __DIR__ . '/views/contact.php';
        break;

    case 'thankyou':
        require __DIR__ . '/views/thankyou.php';
        break;

    case 'profile':
    require_once __DIR__ . '/../app/controllers/ProfileController.php';
    break;

    case 'book':
    require __DIR__ . '/../app/controllers/BookingController.php';
    break;

    case 'payment':
    require __DIR__ . '/../app/controllers/PaymentController.php';
    break;

    case 'process_payment':
    require __DIR__ . '/../app/controllers/ProcessPaymentController.php';
    break;

    case 'invoice':
    require __DIR__ . '/../app/controllers/InvoiceController.php';
    break;

    case 'download_invoice':
    require __DIR__ . '/../app/controllers/DownloadInvoiceController.php';
    break;

    default:
        echo "404 Not Found";
        break;
}