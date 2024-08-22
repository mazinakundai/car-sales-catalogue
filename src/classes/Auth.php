<?php
class Auth {
    public static function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    public static function login($username, $password) {
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
        $user->username = $username;
        $user->password = $password;

        if ($user->login()) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            return true;
        }
        return false;
    }

    public static function logout() {
        session_destroy();
        header("Location: login.php");
    }

    public static function generateCsrfToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    public static function verifyCsrfToken($token) {
        return $token === $_SESSION['csrf_token'];
    }
}
