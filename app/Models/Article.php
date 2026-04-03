<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'image_path', 'is_premium'];

    public function category() {
        
        return $this->belongsTo(Category::class);
    }

    public function comments() {
         return $this->hasMany(Comment::class);
    }

    public function user() {
        
        return $this->belongsTo(User::class);
    }
}


