<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;

    public function artikel()
    {
        return $this->hasMany('App\Artikel', 'category_id');
    }
}
