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

        
}
}