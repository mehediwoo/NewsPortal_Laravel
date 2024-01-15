<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;
use App\Models\SubCategory;
use App\Models\subDistric;
class Post extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(category::class,'cate_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcate_id','id');
    }

    public function subdistric(){
        return $this->belongsTo(subDistric::class,'subdist_id','id');
    }
}
