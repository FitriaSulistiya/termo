<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    protected $table = 'penyuluhan';

    protected $fillable = [
        'judul', 'isi_penyuluhan', 'slug'
    ];

    protected $hidden = [

    ];

    public function penyuluhan_galleries(){
        return $this->hasMany('App\PenyuluhanGallery', 'penyuluhan_id', 'id');
    }
}
