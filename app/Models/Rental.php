<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
 
    protected $fillable=['user_id','car_id','start_date','end_date','total_cost'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function cars(){
        return $this->belongsToMany(Car::class);
    }
}
