<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hospital';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class, 'hospital_id', 'id');
    }
}
