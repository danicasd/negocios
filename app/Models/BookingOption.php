<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookingOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'service_option_id',
        'option_name',
        'extra_price',
    ];

    protected $casts = [
        'extra_price' => 'decimal:2',
    ];

    //Relación uno a muchos inversa
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    //Relación uno a muchos inversa
    public function serviceOption()
    {
        return $this->belongsTo(ServiceOption::class);
    }
}
