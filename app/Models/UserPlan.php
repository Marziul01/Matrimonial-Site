<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;


    public function user(){
       return $this->belongsTo(User::class);
    }

    public function plan(){
       return $this->belongsTo(Plans::class);
    }

}
