<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overnight extends Model
{
    //
    protected $guarded = [] ;


    public function getCustomer() {
        return $this->hasMany(Overnight::class , 'employee_id' ) ;
    }

    public function getSumDaysEmployee() {
        return $this->getCustomer()->sum('days');
    }
}
