<?php
require_once "database.php";

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($name, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed_password);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }
}
?>
