<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Buy extends Model{
    protected $table = 'buy';
    public $timestamps = false;
   protected $fillable = ['id','id-user','id-product','quantity'];
   public function product(){
    return $this->belongsTo(Product::class, 'id-product');
}
}

?>