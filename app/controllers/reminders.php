<?php

class Reminders extends Controller {

    public function index() {
        $reminder = $this->model('Reminder');
        $list_of_reminders = $reminder->all_reminders();
        $this->view('reminders/index', ['reminders' => $list_of_reminders]);
    }

    public function create() {
        $reminder = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = $_POST['subject'];
            $reminder->create_reminder($subject);
            header('Location: /reminders');
            exit;
        }

        $this->view('reminders/create');
    }
    public function update($ID) {
        $reminder = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $subject = $_POST['subject'];
            $reminder->update_reminder($ID, $subject);
            header('Location: /reminders');
            exit;
        }
        $reminderData = $reminder->reminder_by_id($ID);
        $this->view('reminders/edit', ['reminder' => $reminderData]);
    }


     public function delete($ID) {
         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $reminder = $this->model('Reminder');
             $reminder->delete_reminder($ID);
             header('Location: /reminders');
             exit;
         } else {
             die('Invalid request method');
         }
     }

}