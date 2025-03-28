<?php 
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;
   
   class Image extends Model
   {
       use HasFactory;
        
       protected $fillable = ['article_id', 'imagide_path']; // Các trường có thể được gán
   
       public function article()
       {
           return $this->belongsTo(Article::class); // Quan hệ với Article
       }
   } 
?>