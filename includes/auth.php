<?php
require_once 'config.php';
require_once 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    try {
        $conn = getDBConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            
            header('Location: ../pages/dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header('Location: ../index.php');
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Connection failed: " . $e->getMessage();
        header('Location: ../index.php');
        exit();
    }
}
?>
