<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'user_name'
    ];

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
    public function searchableAs(): string
    {
        return 'posts_index';
    }
}
