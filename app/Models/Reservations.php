<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reservations extends Model
{
    //
    protected $guarded = [];

    public function revervationInput()
    {
        return $this->belongsTo(ReservationInputs::class, 'reservations_input_id');
    }
}
