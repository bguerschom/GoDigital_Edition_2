<?php
require_once 'config.php';

function getDBConnection() {
    try {
        $conn = new PDO(
            "pgsql:host=".DB_HOST.";dbname=".DB_NAME,
            DB_USER,
            DB_PASS
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return null;
    }
}

function executeQuery($sql, $params = []) {
    try {
        $conn = getDBConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch(PDOException $e) {
        error_log("Query failed: " . $e->getMessage());
        return null;
    }
}

function getLastInsertId($conn) {
    return $conn->lastInsertId();
}

// Common database functions
function getVisitorById($id) {
    $sql = "SELECT * FROM visitors WHERE id = ?";
    $stmt = executeQuery($sql, [$id]);
    return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
}

function getAvailableBadges() {
    $sql = "SELECT badge_number FROM visitors WHERE check_out_time IS NULL ORDER BY badge_number";
    $stmt = executeQuery($sql);
    if (!$stmt) return [];
    
    $used_badges = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $all_badges = range(1, MAX_BADGES);
    return array_diff($all_badges, $used_badges);
}

function getActiveVisitors() {
    $sql = "SELECT * FROM visitors WHERE check_out_time IS NULL ORDER BY check_in_time DESC";
    $stmt = executeQuery($sql);
    return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
}
?>
