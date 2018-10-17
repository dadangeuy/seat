<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiodataRestoran extends Model
{
    protected $fillable = [
        'user_id', 'deskripsi','alamat',  'no_telp', 'jenis', 'image1', 'image2', 'image3', 'image4', 'image5', 'balance','denah','lengkap','verified',
    ];
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
