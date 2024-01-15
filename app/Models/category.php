<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public function subCat(){
        return $this->hasMany(SubCategory::class,'cate_id','id');
    }
}
