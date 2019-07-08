<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag', 'artikels_tag', 'artikel_id', 'tag_id');
    }
}
