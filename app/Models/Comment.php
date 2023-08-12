<?php

namespace App\MOdels;

use System\Core\Model;

class Comment extends Model {
    protected string $table = 'comments';

    public function article() {
        return $this->relation(Article::class, 'articles', 'article_id', 'parent');
    }
    
}