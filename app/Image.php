<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'folder_id',
        'category',
    ];
    public function folder()
    {
        return $this->hasMany('App\Image');
    }
}
