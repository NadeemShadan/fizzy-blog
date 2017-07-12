<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tress extends Model
{
    //
    protected $table='tresses';

    public $primaryKey='id';

    public $timestamps=true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
