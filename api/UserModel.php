<?php
// models/UserModel.php

class UserModel {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getUserByEmail($email) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM data_user WHERE email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function registerUser($email, $hashedPassword) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    // Other methods for updating user data, deleting user, etc. can be added here
}
?>
