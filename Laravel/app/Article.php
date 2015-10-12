<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

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
}
