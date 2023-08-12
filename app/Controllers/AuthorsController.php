<?php

namespace App\Controllers;

use App\Models\User;
use Faker\Factory;
use System\Core\Controller;

class AuthorsController extends Controller {

    public function __construct() {
        $this->checkAuth();

        if(user()->type == 'Author') {
            set_message('Access Denied!', 'danger');

            redirect(url('dashboard'));
        }
    }

    public function index() {
        $user = new User;
        $authors = $user->where('type', 'Author')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        view('back/authors/index.php', compact('authors'));
    }

    public function create() {
        view('back/authors/create.php');
    }

    public function store() {
        $author = new User;
        $author->name = $_POST['name'];
        $author->email = $_POST['email'];
        $author->password = sha1($_POST['password']);
        $author->phone = $_POST['phone'];
        $author->address = $_POST['address'];
        $author->status = $_POST['status'];
        $author->created_at = now();
        $author->updated_at = now();
        $author->save();

        set_message('Author created.', 'success');

        redirect(url('authors'));
    }

    public function edit($id) {
        $author = new User($id);

        view('back/authors/edit.php', compact('author'));
    }

    public function update($id) {
        $author = new User($id);
        $author->name = $_POST['name'];
        $author->phone = $_POST['phone'];
        $author->address = $_POST['address'];
        $author->status = $_POST['status'];
        $author->updated_at = now();
        $author->save();

        set_message('Author updated.', 'success');

        redirect(url('authors'));
    }

    public function destroy($id) {
        $author = new User($id);
        $author->delete();

        set_message('Author removed.', 'danger');

        redirect(url('authors'));
    }

    public function generate($limit = 50) {
        $faker = Factory::create();
        for($i = 1; $i <= $limit; $i++) {
            $author = new User;
            $author->name = $faker->name();
            $author->email = $faker->unique()->safeEmail();
            $author->phone = $faker->phoneNumber();
            $author->address = $faker->address();
            $author->password = sha1('Password#123');
            $author->created_at = now();
            $author->updated_at = now();
            $author->save();
        }

        set_message('Author generated.', 'success');

        redirect(url('authors'));
    }

}