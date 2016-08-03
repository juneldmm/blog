<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Article extends Model
{
    protected $fillable=[
    'content',
    'title',
    'intro',
    'published_at'

    ];

    public function setPublishedAtAttribute($date){
          $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
    }

    protected $dates = ['published_at'];

    public function scopePublished($query){
       $query->where('published_at','<=',Carbon::now());
    }
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagListAttribute()
    {
        // laravel 5.1 needs all()
        return $this->tags->lists('id')->all();
        // tags means tags() many-to-many relationship with tag
    }
}
