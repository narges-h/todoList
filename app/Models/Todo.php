<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    protected $fillable = ['text','user_id'];
    
    use HasFactory;
    public function user(){
        return $this-> belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagable');
    }
}
