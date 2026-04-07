<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;



    public function category() {
        
        return $this->belongsTo(Category::class);
    }
    // TODO: een file heeft toch geen comments?
    public function comments() {
         return $this->hasMany(Comment::class);
    }
    public function article() {
         return $this->belongsTo(Article::class);
    }
}

