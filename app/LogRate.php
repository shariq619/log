<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'markete',
        'class',
        'species_id',
        'land_status_id',
        'log_size_id',
        'method',
        'price'
    ];

    public function species(){
        return $this->belongsTo(Species::class);
    }

    public function landstatus(){
        return $this->belongsTo(LandStatus::class,'land_status_id');
    }

    public function logsize(){
        return $this->belongsTo(LogSize::class,'log_size_id');
    }

}
