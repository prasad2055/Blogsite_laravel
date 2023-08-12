<?php

const BASEPATH = __DIR__;

// var_dump(BASEPATH);

require BASEPATH . "/vendor/autoload.php";

(new System\Core\Framework)->start();

// $user = new App\Models\User(10);

// $comments = $user->comments()->get();

// dd($user, $comments);

// $comment = new App\Models\comment(2);
// $user = $comment->user()->first();

// dd($comment, $user);


// echo config('db_name');
// echo config('db_host');

// $db = new System\Database\DB;

// $string = $db->quoteEscape("What's your name?");

// $db->run("INSERT INTO users SET name = {$string}, address = 'Location D', email = 'demo@usergmail.com'");

// $db->run('SELECT * FROM users');

// $count = $db->count();

// $data = $db->fetch();

// var_dump($db);

// $data = $db->insertId();

// dd($db,$count,$data);
