<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
  //Model Class For Courses table
 */

Class Course extends Model {

    use SoftDeletes;
    protected $with=['category'];
    public $timestamps = false;

    function scopeActive() {
        return $this->whereActive(1);
    }
    function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
