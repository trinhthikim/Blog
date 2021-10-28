<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use ElasticquentTrait;
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
    protected $mappingProperties = array(
        'title' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'body' => [
            'content' => 'text',
            "analyzer" => "standard",
        ],
    );
}
