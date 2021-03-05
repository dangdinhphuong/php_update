<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Description extends Model{
    protected $table = 'images';
    public $timestamps = false;
    protected $fillable = ['name','id_pro'];
   

    // public function products(){
    //     return $this->hasMany(Product::class, 'id_cate');
    // }
}

?>