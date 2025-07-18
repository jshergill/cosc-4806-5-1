<?php

class Reminder {

    public function __construct() {}


    public function all_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("
            SELECT reminders.*, users.username 
            FROM reminders 
            JOIN users ON reminders.user_id = users.ID
            ORDER BY reminders.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create_reminder($subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        return $stmt->execute();
    }
    public function reminder_by_id($ID) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders WHERE ID = :ID AND user_id = :user_id");
        $stmt->bindValue(':ID', $ID);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update_reminder($ID, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE reminders SET subject = :subject WHERE ID = :ID AND user_id = :user_id");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':ID', $ID);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        return $stmt->execute();
    }
    public function delete_reminder($ID) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM reminders WHERE ID = :ID AND user_id = :user_id");
        $stmt->bindValue(':ID', $ID);
       $stmt->bindValue(':user_id', $_SESSION['user_id']);
        return $stmt->execute();
    }
}