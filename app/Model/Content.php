<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = 'contents';

    protected $fillable  = [
//        'user_id',
        'subject',
        'content',
        'hashtag',
        'like',
        'dislike',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    protected $relations = 'user_id';
}
