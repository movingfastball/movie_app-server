<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        /*ここでの記述はレビュー(Review)は1人のユーザー(user)が投稿している
        ということを下記に表している*/
        
        return $this->belongsTo(User::class);
    }
}
