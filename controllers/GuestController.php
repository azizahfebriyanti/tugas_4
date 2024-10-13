<?php
require_once '../config/Database.php';
require_once '../models/Guest.php';

class GuestController {
    private $guest;

    public function __construct() {
        $db = new Database();
        $conn = $db->connect();
        $this->guest = new Guest($conn);
    }

    public function getGuestById($id) {
        return $this->guest->getGuestById($id);
    }

    public function updateGuest($id, $name, $comment) {
        return $this->guest->updateGuest($id, $name, $comment);
    }

    public function deleteGuest($id) {
        return $this->guest->deleteGuest($id);
    }
}
