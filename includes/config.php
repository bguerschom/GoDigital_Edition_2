// includes/config.php
<?php
session_start();

define('SUPABASE_URL', 'your_supabase_url');
define('SUPABASE_KEY', 'your_supabase_anon_key');
define('PROJECT_ROOT', dirname(__DIR__));

// Database connection info
$db_host = 'db.your_project.supabase.co';
$db_name = 'postgres';
$db_user = 'postgres';
$db_pass = 'your_db_password';

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

// includes/db.php
<?php
require_once 'config.php';

function getDBConnection() {
    global $db_host, $db_name, $db_user, $db_pass;
    
    try {
        $conn = new PDO(
            "pgsql:host=$db_host;dbname=$db_name",
            $db_user,
            $db_pass
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
