<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destinos';
    protected $primaryKey = 'destID';
    public $timestamps = false;

    public function relRegion() {
        return $this->belongsTo('\App\Region', 'regID', 'regID');
    }
}
