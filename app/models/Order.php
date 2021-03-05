<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $table = 'order';
    public $timestamps = false;
   protected $fillable = ['id','name','time','id-user','total_momney','date','status'];
    
   public function Order_detail(){
    return $this->hasMany(Order_detail::class, 'order_id');
}
public function user(){
    return $this->belongsTo(User::class, 'id-user');
}
}

?>