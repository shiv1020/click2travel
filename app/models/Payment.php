<?php

require_once __DIR__ . '/../core/Database.php';

class Payment {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create($booking_id, $amount) {

        $receipt = "CT" . rand(1000,9999);

        $stmt = $this->pdo->prepare("
            INSERT INTO payments 
            (booking_id, receipt_no, amount)
            VALUES (?, ?, ?)
        ");

        $stmt->execute([
            $booking_id,
            $receipt,
            $amount
        ]);
    }
}