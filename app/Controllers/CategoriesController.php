<?php

namespace App\Controllers;

use App\Models\Category;
use System\Core\Controller;

class CategoriesController extends Controller {

    public function __construct() {
        $this->checkAuth();
    }

    public function index() {
        $category = new Category;

        $categories = $category->orderBy('created_at', 'DESC')->paginate();

        view('back/categories/index.php', compact('categories'));
    }

    public function create() {
        view('back/categories/create.php');
    }

    public function store() {
        $category = new Category;
        $category->name = $_POST['name'];
        $category->status = $_POST['status'];
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();

        set_message('Category created.', 'success');
        
        redirect(url('categories'));
    }

    public function edit($id) {
        $category = new Category($id);

        view('back/categories/edit.php', compact('category'));
    }

    public function update($id) {
        $category = new Category($id);
        $category->name = $_POST['name'];
        $category->status = $_POST['status'];
        $category->updated_at = now();
        $category->save();

        set_message('Category updated.', 'success');
        
        redirect(url('categories'));
    }

    public function destroy($id) {
        $category = new Category($id);
        $category->delete();

        set_message('Category remove.', 'danger');
        
        redirect(url('categories'));
    }
}