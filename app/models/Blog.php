<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Blog extends Model{
    protected $table = 'blog';
    public $timestamps = false;
   protected $fillable = ['id','name','detail','description','created_at','updated_at'];
    
}

?>