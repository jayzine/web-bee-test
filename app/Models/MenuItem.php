<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';

	protected $fillable = ['id', 'name', 'url', 'parent_id','created_at', 'updated_at'];

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id')->with('children');
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }
}
