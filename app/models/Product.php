<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = 'products';
    public $timestamps = false;
   protected $fillable = ['id','id_cate','name','images','sale','description','price','id_hometown','created_at','updated_at'];
   
    
   public function category(){
    return $this->belongsTo(Category::class, 'id_cate');
}
public function hometown(){
    return $this->belongsTo(Hometown::class, 'id_hometown');
}
public function comment(){
    return $this->hasMany(Comment::class, 'id');
}
}
?>