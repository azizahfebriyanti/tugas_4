<?php
class Guest {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addGuest($name, $comment) {
        $query = 'INSERT INTO guests (name, comment) VALUES (:name, :comment)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':comment', $comment);
        return $stmt->execute();
    }

    public function getGuests() {
        $query = 'SELECT * FROM guests ORDER BY created_at DESC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGuestById($id) {
        $query = 'SELECT * FROM guests WHERE id = :id LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGuest($id, $name, $comment) {
        $query = 'UPDATE guests SET name = :name, comment = :comment WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':comment', $comment);
        return $stmt->execute();
    }

    public function deleteGuest($id) {
        $query = 'DELETE FROM guests WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
