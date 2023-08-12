<?php

namespace App\Controllers;

use App\Models\Article;
use App\MOdels\Category;
use App\Models\User;
use Faker\Factory;
use System\Core\Controller;

class ArticlesController extends Controller {

    public function __construct() {
        $this->checkAuth();
    }

    public function index() {
        $article = new Article;

        $articles = $article->orderBy('created_at', 'DESC');

        if(user()->type == 'article') {
            $articles = $articles->where('user_id', user()->id);
        }

        $articles = $articles->paginate();

        view('back/articles/index.php', compact('articles'));
    }

    public function create() {
        $categories = $this->get_categories();

        view('back/articles/create.php', compact('categories'));
    }

    public function store() {
        $article = new Article;
        $article->name = $_POST['name'];
        $article->content = $_POST['content'];
        $article->category_id = $_POST['category_id'];
        $article->user_id = user()->id;
        $article->status = $_POST['status'];
        $article->created_at = now();
        $article->updated_at = now();

        if(!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $filename = "img".date('YmdHis').rand(1000,9999).".{$ext}";
            move_uploaded_file($_FILES['file']['tmp_name'], BASEPATH."/assets/images/{$filename}");

            $article->image = $filename;
        }

        if(!empty($_POST['published_at'])) {
            $article->published_at =dt_format($_POST['published_at'], 'Y-m-d H:i:s');
        } elseif( $_POST['status'] == 'Published') {
            $article->published_at = now();
        }

        $article->save();

        set_message('Article created.', 'success');
        
        redirect(url('articles'));
    }

    public function edit($id) {
        $article = new Article($id);
        $categories = $this->get_categories();

        view('back/articles/edit.php', compact('article', 'categories'));
    }

    public function update($id) {
        $article = new Article($id);
        $article->name = $_POST['name'];
        $article->content = $_POST['content'];
        $article->category_id = $_POST['category_id'];
        $article->status = $_POST['status'];
        $article->updated_at = now();

        if(!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $filename = "img".date('YmdHis').rand(1000,9999).".{$ext}";
            move_uploaded_file($_FILES['file']['tmp_name'], BASEPATH."/assets/images/{$filename}");

            if(!empty($article->image)) {
                @unlink(BASEPATH."/assets/images/{$article->image}");
            } 
            

            $article->image = $filename;
        }

        if(!empty($_POST['published_at'])) {
            $article->published_at =dt_format($_POST['published_at'], 'Y-m-d H:i:s');
        } elseif( $_POST['status'] == 'Published') {
            $article->published_at = now();
        }

        $article->save();

        set_message('Article updated.', 'success');
        
        redirect(url('articles'));
    }

    public function destroy($id) {
        $article = new Article($id);
        if(!empty($article->image)) {
            @unlink(BASEPATH."/assets/images/{$article->image}");
        } 
        $article->delete();

        set_message('Article remove.', 'danger');
        
        redirect(url('articles'));
    }

    private function get_categories() {
        $category = new Category;

        return $category->where('status', 'Active')->select('id', 'name')->get();
    }

    public function generate($limit = 50) {

        $categories = (new Category)->select('id')->where('status', 'Active')->get();
        $authors = (new User)->select('id')->where('status', 'Active')->get();
        $faker = Factory::create();
        for($i = 1; $i <= $limit; $i++) {
            $article = new Article;
            $article->name = $faker->realText(50);
            $article->content = $faker->realTextBetween(2000, 3000);
            $category = $categories[rand(0, count($categories) - 1)];
            $article->category_id = $category->id;
            $author = $authors[rand(0, count($categories) - 1)];
            $article->user_id = $author->id;
            $article->status = 'Published';
            $article->created_at = now();
            $article->updated_at = now();
            $article->published_at = now();

            if(rand(0,1)) {
                $filename = "img" . date('YmdHis') . rand(1000, 9999) . ".jpg";
                file_put_contents(BASEPATH . "/assets/images/{$filename}", 
                file_get_contents("https://loremflickr.com/1280/720/random"));

                $article->image = $filename;
            }
            
            $article->save();
        }

        set_message('Article generated.', 'success');

        redirect(url('articles'));
    }
}