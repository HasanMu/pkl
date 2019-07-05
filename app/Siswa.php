<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'umur', 'bio', 'status'
    ];
    public $timestamps = true;
}
