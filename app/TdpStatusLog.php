<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdpStatusLog extends Model
{
    use HasFactory;
    protected $table = 'tdp_status_logs';
    protected $fillable = [
        'status',
        'reason',
        'user_id',
        'assignto_id',
        'tdp_list_id'
    ];
    
}
