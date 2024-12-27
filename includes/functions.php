<?php
require_once 'config.php';
require_once 'db.php';

// Authentication functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function checkAuth() {
    if (!isLoggedIn()) {
        header('Location: ' . SITE_URL . '/index.php');
        exit();
    }
}

function getCurrentUser() {
    if (!isLoggedIn()) return null;
    
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = executeQuery($sql, [$_SESSION['user_id']]);
    return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
}

// Utility functions
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function generateRandomString($length = 10) {
    return bin2hex(random_bytes($length));
}

function formatDate($date) {
    return date('Y-m-d H:i:s', strtotime($date));
}

// Task management functions
function createTask($data) {
    $sql = "INSERT INTO tasks (title, description, status, assigned_to, created_by) 
            VALUES (?, ?, ?, ?, ?)";
    return executeQuery($sql, [
        $data['title'],
        $data['description'],
        $data['status'],
        $data['assigned_to'],
        $_SESSION['user_id']
    ]);
}

function updateTaskStatus($taskId, $status) {
    $sql = "UPDATE tasks SET status = ? WHERE id = ?";
    return executeQuery($sql, [$status, $taskId]);
}

// Visitor management functions
function checkInVisitor($data) {
    $sql = "INSERT INTO visitors (name, id_number, phone, type, department, badge_number, check_in_time) 
            VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    return executeQuery($sql, [
        $data['name'],
        $data['id_number'],
        $data['phone'],
        $data['type'],
        $data['department'],
        $data['badge_number']
    ]);
}

function checkOutVisitor($visitorId) {
    $sql = "UPDATE visitors SET check_out_time = CURRENT_TIMESTAMP WHERE id = ?";
    return executeQuery($sql, [$visitorId]);
}

// Error and success messages
function setMessage($type, $message) {
    $_SESSION[$type . '_message'] = $message;
}

function getMessages() {
    $messages = [];
    if (isset($_SESSION['error_message'])) {
        $messages['error'] = $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    }
    if (isset($_SESSION['success_message'])) {
        $messages['success'] = $_SESSION['success_message'];
        unset($_SESSION['success_message']);
    }
    return $messages;
}
?>
