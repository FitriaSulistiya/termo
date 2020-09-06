<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeternakGallery extends Model
{
    protected $fillable = [
        'peternak_id', 'image'
    ];

    protected $hidden = [

    ];

    public function peternak(){
        return $this->belongsTo('App\Peternak', 'peternak_id', 'id');
    }
}
