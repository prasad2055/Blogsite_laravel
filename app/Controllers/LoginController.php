<?php

namespace App\Controllers;

use App\Models\User;
use System\Core\Controller;

class LoginController extends Controller {

    public function __construct() {
        if(authenticate()) {
            redirect(url('dashboard'));
        }
    }

    public function index() {
        view('back/login/index.php');
    }

    public function check() {
        $user = new User;

        $check = $user->where('email', $_POST['email'])->where('password', sha1($_POST['password']))->first();

        if(!is_null($check)) {
            if($check->status == 'Active') {
                $_SESSION['user_id'] = $check->id;

                if(!empty($_POST['remember']) && $_POST['remember'] == 'yes') {
                    setcookie('blogsite_user', $check->id, time()+30*24*60*60, '/');
                }

                redirect(url('dashboard'));
            } else {
                set_message('Your account is inactive. Please contact site admin.', 'danger');
            redirect(url('login'));
            }
        } else {
            set_message('Invalid email and/or password.', 'danger');
            redirect(url('login'));
        }
    }

}

?>