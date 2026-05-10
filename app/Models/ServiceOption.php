<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceOption extends Model
{
    use HasFactory;

     protected $fillable = [
        'service_id',
        'name',
        'type',
        'extra_price',
        'status',
    ];

    protected $casts = [
        'extra_price' => 'decimal:2',
        'status' => 'boolean',
    ];

    //Relación uno a muchos inversa
    public function services()
    {
        return $this->belongsTo(Service::class);
    }

    //Relación uno a muchos
    public function bookingOptions()
    {
        return $this->hasMany(BookingOption::class);
    }
}
