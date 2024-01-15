<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subDistric extends Model
{
    use HasFactory;

    public function Distric(){

        return $this->belongsTo(distric::class,'distric_id','id');
    }
}
