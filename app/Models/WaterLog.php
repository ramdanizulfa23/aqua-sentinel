<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WaterLog extends Model
{
    use hasFactory;
    // Tambahin baris ini biar data bisa masuk
    protected $fillable = ['ph', 'temp', 'turbidity', 'status'];
}
