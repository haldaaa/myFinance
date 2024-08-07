<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commercial;
use App\Models\Action;
use App\Models\DetailCommande;


class DetailCommandeController extends Controller
{
    //

 
    public function index()
    {

        $transactions = DetailCommande::with(['commercial', 'action'])->get();

        return view('detailcommande.detailcommandeIndex' , compact('transactions'));



    }
    public function show($id)
    {
        $transaction = DetailCommande::with(['commercial', 'action'])->findorFail($id);
     

        return view('detailcommande.show', compact('transaction'));
    }

    public function clearTable()
    {
        DetailCommande::truncate();
        return redirect()->route('detailCommandeIndex')->with('success', 'Table detail_commande vidée avec succès.');
    }

}