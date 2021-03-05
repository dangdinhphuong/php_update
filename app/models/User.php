<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['name','images','id_role','phone','address','email','password','created_at','date_up'];
    public function role_name(){
        return $this->belongsTo(Role::class, 'id_role');
    }
}


?>