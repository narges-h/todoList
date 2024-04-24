<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['imagable_id','imagable_type','image'];
    
    
    public $timestamps = false;
    use HasFactory;

    public function imagable()
    {
        return $this->morphTo();
    }

   
}
