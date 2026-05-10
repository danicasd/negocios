<?php

namespace App\Models;
use App\Models\Category;
use App\Models\ServiceOption;
use App\Models\Booking;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
     use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'base_price',
        'estimated_duration',
        'status',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'status' => 'boolean',
    ];

    //Relación uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relación uno a muchos
    public function options()
    {
        return $this->hasMany(ServiceOption::class);
    }

    //Relación uno a muchos
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
