<?php

class User {
    private $username;
    private $address;
    private $password;
    private $conn;

    public function __construct($username, $address, $password, $conn) {
        $this->username = $username;
        $this->address = $address;
        $this->password = $password;
        $this->conn = $conn;
    }

    public function createUser() {
        $sql = "INSERT INTO user (nom, mail, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->username, $this->address, $this->password]);
    }
// hne khdemna bel placeholders '?'





    public function authenticate() {
        $query = "SELECT * FROM user WHERE nom = :username AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        
        $count = $stmt->rowCount();
        
        if ($count > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['username'] = $this->username;
            $_SESSION['adresse'] = $user['mail']; 
            return true;
        } else {
            return false;
        }
    }
//hne khdemn bel bind (zouz yaamlou nafs l haja)









}
