<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = ['title', 'content', 'user_id', 'category_id'];
     // Mối quan hệ với Category
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
     public function images()
    {
        return $this->hasMany(Image::class);
    }
}