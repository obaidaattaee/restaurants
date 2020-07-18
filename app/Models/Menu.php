<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'title' , 'type' , 'description' , 'status' , 'image' , 'user_id'  , 'parent_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id' , 'id');
    }
    public function items (){
        return $this->hasMany('App\Models\Items' , 'menu_id' , 'id');
    }
    public function parentMenu(){
        return $this->belongsTo('App\Models\Menu' , 'parent_id' , 'id' );
    }
    public function subMenus(){
        return $this->hasMany('App\Models\Menu' ,'parent_id','id' ) ;
    }

}
