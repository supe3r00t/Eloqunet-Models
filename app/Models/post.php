<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory;
    use SoftDeletes;
//اضافة كل جدول باسمه
    //protected $fillable=['title','body'];

 protected $guarded=[];
    //اضافة مجموعه بدون تحديد


    //
    //اضافة داخل [الجدول الي ماتي]

    //
//public function scopeSamir($query){

    //return $query->where('body','>'100);

//}

}
