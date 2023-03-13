<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'feeds',
        'note'
        // add all other fields
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $table = 'animal';
}
