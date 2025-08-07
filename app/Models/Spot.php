<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'status',
    ];

    public function spot_detail()
    {
        return $this->hasMany(SpotDetail::class, 'spot_id');
    }
}
