<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = [
        'name',
        'color',
        'user_id'
    ];
    public function Image()
    {
        return $this->hasOne('App\Folder');
    }
}
