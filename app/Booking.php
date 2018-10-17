<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'biodatauser_id', 'biodatarestoran_id', 'kursi_id', 'tanggal', 'jam_mulai','jam_berakhir','kode_pembayaran','status'
    ];
    public function biodataUser()
    {
        return $this->belongsTo('App\BiodataUser','biodatauser_id');
    }
    public function biodataRestoran()
    {
        return $this->belongsTo('App\BiodataRestoran','biodatarestoran_id');
    }
    public function kursi()
    {
        return $this->belongsTo('App\Kursi');
    }
}
