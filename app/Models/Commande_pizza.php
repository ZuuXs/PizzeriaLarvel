<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Commande_pizza extends Model
{
    use HasFactory;
    

    protected $table = 'commande_pizza';
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public $timestamps = false;

    protected $fillable = ['commande_id', 'pizza_id', 'qte'];

    public function commande()
    {
        return $this->belongsTo(Commande::class, "pizza_id");
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, "pizza_id");
    }
}