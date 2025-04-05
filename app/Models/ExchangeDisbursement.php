<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeDisbursement extends Model
{
    //
    protected $guarded = [] ;

    public function exchange() {
        return $this->belongsTo(Exchange::class , 'ExchangeType');
    }
}
