<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdpList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function status(){
        return $this->hasMany(TdpStatusLog::class);
    }
}
