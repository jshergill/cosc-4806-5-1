<?php
class User
{
    public function test(){
}
    public function register(string $username, string $password): void
    {
        $db = db_connect();
        $username = strtolower($username);

        // 1. username must be unique
        $check = $db->prepare('SELECT 1 FROM users WHERE username = :u');
        $check->execute([':u' => $username]);
        if ($check->fetchColumn()) {
            throw new Exception('Username already taken.');
        }

        // 2. hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // 3. insert the new user
        $add = $db->prepare(
            'INSERT INTO users (username, password, created_at) VALUES (:u, :p, NOW())'
        );
        $add->execute([':u' => $username, ':p' => $hash]);
    }

    public function authenticate(string $username, string $password): void
    {
        $db = db_connect();
        $username = strtolower($username);

        $stmt = $db->prepare('SELECT id, password FROM users WHERE username = :u');
        $stmt->execute([':u' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $success = 0;
        $user_id = null;

        if ($row && password_verify($password, $row['password'])) {
            $success = 1;
            $user_id = $row['id'];

            $_SESSION['auth']     = 1;
            $_SESSION['username'] = ucwords($username);
            $_SESSION['user_id']  = $user_id;
            unset($_SESSION['failedAuth']);
        } else {
            $_SESSION['failedAuth'] = ($_SESSION['failedAuth'] ?? 0) + 1;
        }

        // ✅ Insert into login_logs table
        $log = $db->prepare('INSERT INTO login_logs (user_id, username_attempted, success, created_at)
                             VALUES (:uid, :uname, :success, NOW())');
        $log->execute([
            ':uid'    => $user_id,
            ':uname'  => $username,
            ':success'=> $success
        ]);

        if ($success) {
            header('Location: /home');
        } else {
            header('Location: /login');
        }
        exit;
    }

}
