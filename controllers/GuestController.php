<?php
include_once 'config/Database.php';
include_once 'models/Guest.php';

class GuestController {
    private $guest;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->guest = new Guest($db);
    }

    public function create($name, $comment) {
        $this->guest->name = $name;
        $this->guest->comment = $comment;
        return $this->guest->create();
    }

    public function readAll() {
        return $this->guest->readAll();
    }
}
?>
