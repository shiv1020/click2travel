<?php
require_once __DIR__ . '/../core/Database.php';

class Package {

    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM packages ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFiltered($filters = [])
{
    $sql = "SELECT * FROM packages WHERE 1=1";
    $params = [];

    // 🔍 SEARCH BY NAME
    if (!empty($filters['search'])) {
        $sql .= " AND name LIKE :search";
        $params[':search'] = "%" . $filters['search'] . "%";
    }

    // 💰 PRICE FILTER
    if (!empty($filters['price'])) {
        $sql .= " AND price <= :price";
        $params[':price'] = $filters['price'];
    }

    // 📅 DURATION FILTER
    if (!empty($filters['days'])) {
        $sql .= " AND duration LIKE :days";
        $params[':days'] = "%" . $filters['days'] . "%";
    }

    // 🏷 CATEGORY FILTER
    if (!empty($filters['category'])) {
        $sql .= " AND package_type = :category";
        $params[':category'] = $filters['category'];
    }

    $sql .= " ORDER BY id DESC";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM packages WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}