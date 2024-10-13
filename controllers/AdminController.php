<?php
require_once '../config/Database.php';
require_once '../models/Admin.php';

class AdminController {
    private $admin;

    public function __construct() {
        $db = new Database();
        $conn = $db->connect();
        $this->admin = new Admin($conn);
    }

    public function login($username, $password) {
        return $this->admin->login($username, $password);
    }
}
