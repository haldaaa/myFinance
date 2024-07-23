<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commercial;
use App\Models\Action;
use App\Models\DetailCommande;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\DB;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function acheteAction()
    {
        Log::channel('myLog')->info('Fonction acheterAction.');

        // Récupérer tous les commerciaux
        $commerciaux = Commercial::all();
        // Sélectionner aléatoirement un nombre de commerciaux (entre 1 et X)
        $nombreCommerciaux = rand(1, $commerciaux->count());
        $commerciauxSelectionnes = $commerciaux->random($nombreCommerciaux);
        // Récupérer la valeur du compteur
        $compteur = DB::table('compteurs')->where('id', 1)->value('valeur');
        foreach ($commerciauxSelectionnes as $commercial) {
            // Sélectionner aléatoirement un nombre d'actions à acheter (entre 1 et 7)
            $nombreActions = rand(1, 7);
            for ($i = 0; $i < $nombreActions; $i++) {
                // Sélectionner une action aléatoirement
                $action = Action::inRandomOrder()->first();
                $quantite = rand(1, 10); // Quantité aléatoire entre 1 et 10
                try {
                    Log::channel('myLog')->info('Début de la transaction.');
                    DB::beginTransaction();

                    // Total commande
                    $totalPrixCommande = $quantite * $action->prix;

                    // Vérifier les conditions
                    if ($action->quantite < $quantite) {
                        throw new \Exception("Quantite insuffisante pour l'action {$action->nomAction} , quantite disponible : {$action->quantite}");
                    }

                    if ($commercial->budget < $totalPrixCommande) {
                        throw new \Exception("Budget insuffisant pour le commercial {$commercial->nom} , budget disponible : {$commercial->budget}");
                    }

                    // MaJ table action quantité
                    $action->quantite -= $quantite;
                    $action->save();

                    // MaJ table commercial
                    $commercial->budget -= $totalPrixCommande;
                    $commercial->save();

                    // Enregistrer le détail de la commande
                    DetailCommande::create([
                        'commercial_id' => $commercial->id,
                        'action_id' => $action->id,
                        'quantite' => $quantite,
                        'tour' => $compteur, // Ajout du champ 'tour'
                        'prix_unitaire' => $action->prix,
                        'total' => $totalPrixCommande,
                    ]);

                    DB::commit();

                    Log::channel('myLog')->info('Le commercial "' . $commercial->nom . '" a achete ' . $quantite . ' actions "' . $action->nomAction . '".');
                } catch (\Exception $e) {
                    DB::rollBack();
                    Log::channel('myLog')->error("KO: " . $e->getMessage());
                }
            }
        }

        // Récupérer les informations des commerciaux pour la vue
        $commercialInfo = Commercial::all();
        return view('commercial.commercialIndex', compact('commercialInfo', 'compteur'));
    }




    public function index()
    {
        $commercialInfo = Commercial::with(['detailCommandes.action'])->get();
        return view('Commercial.commercialIndex', compact('commercialInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données 
        $request->validate([
            'nom' => 'required|string',
            'budget' => 'required|numeric',
        ]);

        return redirect()->route('commercial.show')->with('success', 'Commercial crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commercial = Commercial::with(['detailCommandes.action'])->findOrFail($id);
        $commercial = Commercial::withCount('detailCommandes')->findOrFail($id);
        // Calcul du prix total par action et du prix total général
        $totalGeneral = 0;
        foreach ($commercial->detailCommandes as $detail) {
            $detail->total_par_action = $detail->quantite * $detail->prix_unitaire;
            $totalGeneral += $detail->total_par_action;
        }

        // Paginer les détails des commandes
        $detailCommandes = $commercial->detailCommandes()->paginate(10);

        return view('Commercial.show', compact('commercial', 'totalGeneral', 'detailCommandes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}