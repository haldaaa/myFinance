<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = "actions";

    protected $fillable = [
        'nomAction' ,
        'quantité' ,
        'prix' ,
    ];
    
    public function detailCommandes()
    {
        return $this->hasMany(DetailCommande::class);
    }
}
