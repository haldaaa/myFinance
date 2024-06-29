<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commercial;
use App\Models\Action;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ActionController extends Controller
{



    // Ajuste le prix des fonctions aléatoirement, est appelé dans une commande artisan (app/Commands/MettreAJourLesPrixActions.php)


 public function actionsParCommercial()
    {
        // Récupérer tous les commerciaux avec leurs détails de commandes et les actions associées
        $commerciaux = Commercial::with('detailCommandes.action')->get();

        // Calculer les totaux par commercial
        foreach ($commerciaux as $commercial) {
            $totaux = [];
            foreach ($commercial->detailCommandes as $detailCommande) {
                $nomAction = $detailCommande->action->nomAction;
                if (!isset($totaux[$nomAction])) {
                    $totaux[$nomAction] = [
                        'quantite' => 0,
                        'montant' => 0
                    ];
                }
                $totaux[$nomAction]['quantite'] += $detailCommande->quantite;
                $totaux[$nomAction]['montant'] += $detailCommande->quantite * $detailCommande->prix_unitaire;
            }
            $commercial->totaux = $totaux;
        }

        return view('test', compact('commerciaux'));
    }



    // Met a jour le prix de toute les actions :
    public function mettreAJourPrixActions()
    {
        Log::channel('myLog')->info('Fonction mettreAJourPrixActions');
        $actions = Action::all();
        foreach ($actions as $action) {
            $prixInitial = $action->prix;
            $nouveauPrix = $this->ajusterPrix($prixInitial);
            $action->prix = $nouveauPrix;
            $action->save();

            Log::channel('myLog')->info("Le prix de l'action {$action->nomAction} vient d'etre mis a jour a {$nouveauPrix} E, ancien prix : {$prixInitial} E.");
        }

        return response()->json(['message' => 'Les prix des actions ont été mis à jour.']);
    }

    public function ajusterPrix($prixInitial) 
    {
        Log::channel('myLog')->info('Fonction ajusterPrix');
    
        // Définir les pourcentages d'ajustement
        $pourcentages = [
            1.10,  // Augmenter de 10%
            1.08,  // Augmenter de 8%
            0.95,  // Diminuer de 5%
            0.93,  // Diminuer de 7%
            0.9,   // Diminuer de 10%
            1,     // Pas de changement
            0.94,  // Diminuer de 6%
            1.04,  // Augmenter de 4%
            1.01,  // Augmenter de 1%
            1.02,  // Augmenter de 2%
            0.98,  // Diminuer de 2%
            0.92,  // Diminuer de 8%
            1,     // Pas de changement
            1,     // Pas de changement
            0.95,  // Diminuer de 5%
        ];

        // Choisir un pourcentage aléatoirement
        $ajustement = $pourcentages[array_rand($pourcentages)];

        // Vérifier que $prixInitial est bien un nombre
        if (!is_numeric($prixInitial)) {
         //   Log::channel('myLog')->info("Le prix initial n'est pas un nombre : '{$prixInitial}' ");
            return $prixInitial; // Retourner le prix initial sans ajustement
        }

        // Calculer le nouveau prix
        $nouveauPrix = $prixInitial * $ajustement;
        Log::channel('myLog')->info("Ajustement choisi : {$ajustement}, prix initial : {$prixInitial}, nouveau prix : {$nouveauPrix}");

        return $nouveauPrix;
    }



    // Fonction qui rajoute aléatoirement des actions
    public function quantiteAction()
    {
        Log::channel('myLog')->info("Fonction quantiteAction :");
        // Récupérer toutes les actions
        $actions = Action::all();

        // Vérifier qu'il y a des actions disponibles
        if ($actions->isEmpty()) {
            Log::channel('myLog')->info("Aucune action disponible pour ajouter des actions aleatoires.");
            return;
        }

        // Parcourir chaque action et ajouter un nombre aléatoire d'actions
        foreach ($actions as $action) {
            // Générer un nombre aléatoire entre 1 et 9
            $nombreActions = rand(1, 9);
            Log::channel('myLog')->info("Action selectionnee : {$action->nomAction}, nombre d'actions a ajouter : {$nombreActions}");

            // Ajouter les actions à l'action sélectionnée
            $action->quantite += $nombreActions;
            $action->save();

            Log::channel('myLog')->info("Nouvelle quantité pour l'action {$action->nomAction} : {$action->quantite}");
        }
    }


    public function dividende()
    {
        Log::channel('mylog')->info("Fonction Dividende :");
        
        $actions = Action::all();
    }


    // Action qui attribue un coefficient de performance a une action en fonction de la
    public function performance($action)
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $action = Action::all();

        return view('action.actionIndex' , compact('action'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
