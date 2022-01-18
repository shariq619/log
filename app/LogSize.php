<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSize extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'from_size',
        'to_size',
        'unit_size'
    ];
}
