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
        
        // 2. Who has the most reminders
        $mostRemindersStmt = $db->query('
            SELECT u.username, COUNT(r.id) AS total
            FROM reminders r
            JOIN users u ON r.user_id = u.id
            GROUP BY r.user_id
            ORDER BY total DESC
            LIMIT 1
        ');
        $mostReminders = $mostRemindersStmt->fetch(PDO::FETCH_ASSOC);

        // 3. Total logins by username (successful only)
        $loginCountsStmt = $db->query("
            SELECT username_attempted, COUNT(*) AS total_logins
            FROM login_logs
            WHERE success = 1
            GROUP BY username_attempted
        ");
        $loginCounts = $loginCountsStmt->fetchAll(PDO::FETCH_ASSOC);

        $this->view('reports/index', [
            'allReminders'    => $allReminders,
            'mostReminders'   => $mostReminders,
            'loginCounts'     => $loginCounts
        ]);
        
}
}