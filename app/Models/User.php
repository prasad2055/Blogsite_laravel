<?php

namespace App\Models;

use System\Core\Model;

class User extends Model {
    protected string $table = 'users';

    public function articles() {
        return $this->relation(Article::class, 'articles', 'user_id');
    }

}