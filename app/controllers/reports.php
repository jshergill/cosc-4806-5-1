<?php

class Reports extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['auth']) || !$_SESSION['is_admin']) {
            header('Location: /login');
            exit;
        }

        $db = db_connect();
        
        // 1. Get all reminders
        $remindersStmt = $db->query('SELECT * FROM reminders');
        $allReminders = $remindersStmt->fetchAll(PDO::FETCH_ASSOC);
        
}
}