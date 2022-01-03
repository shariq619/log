<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdpLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_no',
        'log_no',
        'species',
        'diameter_1',
        'diameter_2',
        'diameter_mean',
        'symbol',
        'defect_length',
        'defect_diameter',
        'length',
        'tdp_list_id',
    ];
}
