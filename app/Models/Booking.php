<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'address_id',
        'scheduled_at',
        'status',
        'base_price',
        'extra_total',
        'total',
        'notes',
        'technician_id',
        'cancellation_reason',
        'cancelled_at',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'base_price' => 'decimal:2',
        'extra_total' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    //Relación uno a muchos inversa
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    //Relación uno a muchos inversa
    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    //Relación uno a muchos
    public function options()
    {
        return $this->hasMany(BookingOption::class);
    }

    //Relación uno a uno
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    //Relación uno a uno
    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
