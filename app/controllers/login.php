<?php
class Login extends Controller
{
		public function index()
		{
				$this->view('login/index');
		}

		public function verify()
		{
				if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
						header('Location: /login');
						exit;
				}
				if (session_status() === PHP_SESSION_NONE) {
						session_start();
				}

				$username = $_POST['username'] ?? '';
				$password = $_POST['password'] ?? '';

				$this->model('User')->authenticate($username, $password);
				// authenticate() redirects internally, so nothing more here.
		}
}
