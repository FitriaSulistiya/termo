<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyuluhanGallery extends Model
{
    protected $fillable = [
        'penyuluhan_id', 'image'
    ];

    protected $hidden = [

    ];

    public function penyuluhan(){
        return $this->belongsTo('App\PenyuluhanGallery', 'penyuluhan_id', 'id');
    }
}
