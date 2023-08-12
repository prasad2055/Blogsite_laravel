<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use System\Core\Controller;

class PagesController extends Controller {

    public function index() {
        $article = new Article;

        $latest = $article->select('id', 'name', 'image', 'content')
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'DESC')
            ->first();

            $articles = $article->select('id', 'name', 'image')
            ->where('status', 'Published')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'DESC')
            ->limit(1, 12)
            ->get();

        view('back/front/pages/index.php', compact('latest', 'articles'));
    }

    public function category($id) {
        $category = new Category($id);

        $articles = $category->articles()
        ->select('id', 'name', 'image')
        ->where('status', 'Published')
        ->where('published_at', '<=', now())
        ->orderBy('published_at', 'DESC')
        ->paginate(15);

        view('back/front/pages/category.php', compact('category', 'articles'));
    }

    public function article($id) {
        $article = new Article($id);

        $comments = $article->comments()->get();

        view('back/front/pages/article.php', compact('article', 'comments'));
    }

    public function comment($id) {
        $comment = new Comment;
        $comment->article_id = $id;
        $comment->name = $_POST['name'];
        $comment->email = $_POST['email'];
        $comment->content = $_POST['content'];
        $comment->created_at = now();
        $comment->save();

        set_message('Thank you for your comment.', 'success');

        redirect(url("pages/article/{$id}"));
    }

}