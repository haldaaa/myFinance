<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $table = "commerciaux";

    protected $fillable = [
        'nomCommercial' ,
        'entrepriseCommercial' ,
        'budget' ,
    ];
    

    public function detailCommandes()
    {
        return $this->hasMany(DetailCommande::class);
    }
}
