<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
	protected $fillable = [
        'user_id', 'bukti','verified'
    ];
   	public function user()
    {
        return $this->belongsTo('App\user');
    }
}
