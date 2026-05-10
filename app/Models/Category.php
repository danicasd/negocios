<?php

namespace App\Models;
use App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

     //Relacion uno a muchos
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}


   



