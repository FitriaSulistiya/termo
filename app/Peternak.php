<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    protected $table = 'peternak';

    protected $fillable = [
        'user_id','slug', 'deskripsi', 'nama', 'alamat', 
        'no_telp', 'jumlah_ternak', 'jenis_ternak', 'status_verifikasi'
    ];
    //menambah kolom avatar

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function peternak_galleries(){
        return $this->hasMany('App\PeternakGallery', 'peternak_id', 'id');
    }

    public function getAvatar(){
        // if(!$this->avatar){
        //     return url('public/frontend/images/user.jpeg');
        // }
        // return asset('peternak/'.$this->avatar);

        return $this->url('public/frontend/images/user.jpeg');
    }
}
