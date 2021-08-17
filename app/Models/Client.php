<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $casts = [
        'services' => 'array',
    ];

    public function projects()
    {
    	return $this->hasMany(Project::class);
    }

    public function images()
    {
    	return $this->hasMany(Image::class);
    }
}
