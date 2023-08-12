<?php

namespace App\Controllers;

use App\Models\Comment;
use System\Core\Controller;

class CommentsController extends Controller {

    public function __construct() {
        $this->checkAuth();
    }

    public function index() {
        $comment = new Comment;

        $comments = $comment->orderBy('created_at', 'DESC')->paginate();

        view('back/comments/index.php', compact('comments'));
    }


    public function destroy($id) {
        $comment = new Comment($id);
        $comment->delete();

        set_message('Comment remove.', 'success');
        
        redirect(url('comments'));
    }
}