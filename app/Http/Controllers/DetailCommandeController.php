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
    public function showTransaction($id)
    {
        $transaction = DetailCommande::with(['commercial', 'action'])->findorFail($id);

        return view('detailcommande.show', compact('transaction'));
    }

}

