<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/* 
//Model Class For Categories table 
 */
Class Category extends Model
{
    use SoftDeletes;
    public $timestamps=false;
    function scopeActive($query){
        return $query->whereActive(1);
    }
    
}
