<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class regisevent extends Model
{
    public $timestamps = false;
    protected $table = 'regisevents';
    protected $fillable = ['id_event','id_pasien','no_antrian'];

    public function event()
    {
        return $this->belongsTo(event::class,'id_event','id_event');
    }

    public function pasien()
    {
        return $this->belongsTo(pasien::class,'id_pasien','id_pasien');
    }
}

