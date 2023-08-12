<?php

namespace App\MOdels;

use System\Core\Model;

class Article extends Model {
    protected string $table = 'articles';

    public function category() {
        return $this->relation(Category::class, 'categories', 'category_id', 'parent');
    }

    public function user() {
        return $this->relation(User::class, 'users', 'user_id', 'parent');
    }

    public function comments() {
        return $this->relation(Comment::class, 'comments', 'article_id');
    }
    
}