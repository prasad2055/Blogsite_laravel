<?php

namespace App\Controllers;

use System\Core\Controller;

class PasswordController extends Controller {

    public function __construct() {
        $this->checkAuth();
    }

    public function edit() {
        view('back/password/edit.php');
    }

    public function update() {
        $user = user();

        if($user->password == sha1($_POST['old_password'])) {
            $user->password = sha1($_POST['password']);
            $user->save();

            set_message('password updated.', 'success');
        } else {
            set_message('The old password is incorrect.', 'danger');
        }

        redirect(url('password/edit'));
    }
}