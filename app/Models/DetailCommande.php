<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;

    protected $table = "detail_commande";
    protected $fillable = ['commercial_id', 'action_id', 'quantite', 'tour', 'prix_unitaire', 'total'];

    public function commercial()
    {
        return $this->belongsTo(Commercial::class);
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
