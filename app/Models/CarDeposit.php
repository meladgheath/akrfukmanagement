<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDeposit extends Model
{
    //
    protected $guarded = [] ;

    public function car() {
        return $this->belongsTo(Cars::class,'carId','id');
    }
    public function carStatus() {
        return $this->belongsTo(CarStatus::class,'status','id');
    }
}
