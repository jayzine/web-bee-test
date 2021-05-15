<?php

namespace App\Models;

use App\Models\Workshop;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	protected $table = 'events';

	protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

	public function workshops()
	{
		return $this->hasMany(Workshop::class);
	}
}
