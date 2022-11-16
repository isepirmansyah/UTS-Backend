<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pantients extends Model
{
    use HasFactory;
    protected $table = 'pantients';
    protected $fillable = [
        'id',
        'name',
        'phone',
        'address',
        'status',
        'in_date_at',
        'out_date_at',
    ];
    protected $primaryKey = 'id';
}
