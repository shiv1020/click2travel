<?php

require_once __DIR__ . '/../models/Package.php';

$packageModel = new Package();

/* ===============================
   SINGLE PACKAGE (DETAILS PAGE)
================================= */

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);
    $package = $packageModel->findById($id);

    if (!$package) {
        die("Package not found");
    }

    require __DIR__ . '/../../public/views/package_details.php';
    exit;
}

/* ===============================
   PACKAGE LIST + FILTER
================================= */

$filters = [
    'search'   => $_GET['search'] ?? null,
    'price'    => $_GET['price'] ?? null,
    'days'     => $_GET['days'] ?? null,
    'category' => $_GET['category'] ?? null
];

if (!empty($filters['search']) ||
    !empty($filters['price']) ||
    !empty($filters['days']) ||
    !empty($filters['category'])) {

    $packages = $packageModel->getFiltered($filters);
} else {
    $packages = $packageModel->getAll();
}

require __DIR__ . '/../../public/views/packages.php';