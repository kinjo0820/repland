<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    

    protected $fillable = ['caption','image','reptiles'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reptiles()
    {
        return $this->belongsTo(Reptile::class);
    }



    public function likes()
    {
    return $this->hasMany(Like::class, 'post_id');
    }

    public function is_liked_by_auth_user()
    {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
    }
}
