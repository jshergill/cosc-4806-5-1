<?php
class Create extends Controller
{
    public function index()
    {
        $this->view('create/index');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /create');
            exit;
        }

        // Always start / resume the session first
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username        = trim($_POST['username'] ?? '');
        $password        = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Passwords do not match.';
            header('Location: /create');
            exit;
        }

        try {
            $user = $this->model('User');
            $user->register($username, $password);  // make sure register() hashes!
            $_SESSION['success'] = 'Account created successfully. You can now log in.';
            header('Location: /login');
            exit;
        } catch (Exception $e) {
            // Optional: log $e->getMessage()
            $_SESSION['error'] = 'Something went wrong. Try again.';
            header('Location: /create');
            exit;
        }
    }
}
