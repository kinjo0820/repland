<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reptile extends Model
{
    use HasFactory;

    protected $fillable = ['name','image','body','habitat','length','lifespan'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
