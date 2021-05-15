<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use App\Models\Event;

class Workshop extends Model
{
	protected $table = 'workshops';

	protected $fillable = ['id', 'start', 'end', 'event_id', 'name', 'created_at', 'updated_at'];

	public function events()
	{
		return $this->belongsTo(Event::class);
	}
}
