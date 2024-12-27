<?php
session_start();

// Database configuration
define('DB_HOST', 'your_supabase_host');
define('DB_NAME', 'postgres');
define('DB_USER', 'postgres');
define('DB_PASS', 'your_db_password');

// Supabase configuration
define('SUPABASE_URL', 'your_supabase_url');
define('SUPABASE_KEY', 'your_supabase_anon_key');

// Application configuration
define('SITE_URL', 'your_site_url');
define('MAX_BADGES', 20);

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Time zone
date_default_timezone_set('Africa/Kigali');
?>
