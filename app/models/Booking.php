<?php

require_once __DIR__ . '/../core/Database.php';

class Booking {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    /* ===============================
       CREATE BOOKING & RETURN ID
    ================================= */

    public function createAndReturnId($data) {

        $stmt = $this->pdo->prepare("
            INSERT INTO bookings 
            (user_id, package_id, guests, arrival_date, status, total_amount)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $data['user_id'],
            $data['package_id'],
            $data['guests'],
            $data['arrival_date'],
            $data['status'],
            $data['total_amount']
        ]);

        return $this->pdo->lastInsertId();
    }
}