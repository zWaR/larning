<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id'  //temporary
    ];

    /**
     * Additional fields to treat as Varbon instances.
     * @var array
     */
    protected $dates = ['published_at'];

    //query scope
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    //query scope
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }

    //mutator
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }


    /**
     * An article is owned by a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
