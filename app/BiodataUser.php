<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiodataUser extends Model
{
    protected $fillable = [
        'user_id', 'alamat', 'no_telp', 'image', 'balance'
    ];
    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
