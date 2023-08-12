<?php

namespace App\MOdels;

use System\Core\Model;

class Category extends Model {
    protected string $table = 'categories';

    public function articles() {
        return $this->relation(Article::class, 'articles', 'category_id');
    }
    
}