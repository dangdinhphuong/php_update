<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    protected $table = 'comment';
    public $timestamps = false;
   protected $fillable = ['id_pro','id_user','comment','date','status'];
   
    
   public function products(){
    return $this->belongsTo(Product::class, 'id_pro');
}
public function user(){
    return $this->belongsTo(User::class, 'id_user');
}
}
?>