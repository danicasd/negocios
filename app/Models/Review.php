<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Review extends Model
{
     use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'rating',
        'comment',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    //Relacion uno a mucchos inversa
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    //Relacion uno a mucchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
