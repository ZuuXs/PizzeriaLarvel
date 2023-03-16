<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps=true;
    
    function commandes(){
        return $this->belongsToMany(Commande::class);
    }

    public function commande_pizza()
    {
        return $this->hasMany(Commande_pizza::class);
    }
}
