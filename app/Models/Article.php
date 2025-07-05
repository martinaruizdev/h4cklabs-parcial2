<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'news';
    
    protected $primaryKey = 'new_id';

    protected $fillable = ['title', 'subtitle', 'author', 'release_date', 'description', 'tag'];
}
