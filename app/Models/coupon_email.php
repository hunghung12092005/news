<?php 
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;
   
   class coupon_email extends Model
   {
       use HasFactory;
       protected $table = 'coupon_email';
       protected $fillable = ['email', 'check_status','name']; // Thêm email vào đây
   } 
?>