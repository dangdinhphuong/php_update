<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order_detail extends Model{
    protected $table = 'order-detail';
    public $timestamps = false;
   protected $fillable = ['id','images_sp','order_id','price','name_sp','quantity'];
   
public function order(){
    return $this->belongsTo(Order::class, 'order_id');
}
// public function hometown(){
//     return $this->belongsTo(Hometown::class, 'id_hometown');
// }
}
?>