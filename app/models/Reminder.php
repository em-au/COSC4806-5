<?php

class Reminder {

  public function __construct() {

  }

  public function get_all_reminders() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM reminders WHERE user_id = :user_id;");
    $statement->bindParam(':user_id', $_SESSION['user_id']);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_incomplete_reminders() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM reminders WHERE user_id = :user_id AND deleted = 0 AND completed = 0;");
    $statement->bindParam(':user_id', $_SESSION['user_id']);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_completed_reminders() {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM reminders WHERE user_id = :user_id AND completed = 1 ORDER BY completed_at DESC");
    $statement->bindParam(':user_id', $_SESSION['user_id']);
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
  }

  public function get_reminder_by_id($id) {
    $db = db_connect();
    $statement = $db->prepare("SELECT * FROM reminders WHERE id = :id;");
    $statement->bindParam(':id', $id);
    $statement->execute();
    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
  }
  
  public function add_reminder($subject) {
    $db = db_connect();
    $statement = $db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:user_id, :subject)");
    $statement->bindParam(':user_id', $_SESSION['user_id']);
    $statement->bindParam(':subject', $subject);
    $statement->execute();
  }
  
  public function edit_reminder($id, $subject) {
    $db = db_connect();
    $statement = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
    $statement->bindParam(':subject', $subject);
    $statement->bindParam(':id', $id);
    $statement->execute();
  }

  public function mark_reminder_deleted($id) {
    $db = db_connect();
    $statement = $db->prepare("UPDATE reminders SET deleted = 1 WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();
  }

  public function mark_reminder_completed($id) {
    $db = db_connect();
    $statement = $db->prepare("UPDATE reminders SET completed = 1, completed_at = current_timestamp() WHERE id = :id");
    $statement->bindParam(':id', $id);
    $statement->execute();
  }

}
?>