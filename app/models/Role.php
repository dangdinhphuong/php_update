<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Role extends Model{
    protected $table = 'role';
    public $timestamps = false;
   protected $fillable = ['id','name','id_role'];
    
   public function user(){
    return $this->hasMany(User::class, 'id_role');
}
}

?>