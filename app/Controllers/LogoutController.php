<?php

namespace App\Controllers;

use System\Core\Controller;

class LogoutController extends Controller {

    public function __construct() {
        $this->checkAuth();
    }

    public function index() {
        session_unset();

        if(!empty($_COOKIE['blogsite_user'])) {
            setcookie('blogsite_user', null, time() - 120, '/');
        }

        set_message('You have been logged out.');

        redirect(url('login'));
    }
}