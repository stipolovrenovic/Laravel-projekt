<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
	use HasFactory;

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function getDeployedAtAttribute($value)
	{
		return Carbon::createFromFormat('Y-m-d', $value)->format('d.m.Y.');
	}

	public function setDeployedAtAttribute($value)
	{
		$this->attributes['deployed_at'] = Carbon::createFromFormat('d.m.Y.', $value)->format('Y-m-d');
	}
}
