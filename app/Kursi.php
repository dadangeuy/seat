<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    protected $fillable = [
        'restoran_id', 'name', 'kapasitas', 'harga',
    ];
    public function biodataRestoran()
    {
        return $this->belongsTo('App\BiodataRestoran');
    }
}
