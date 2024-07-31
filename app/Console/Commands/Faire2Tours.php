<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CommercialController;
use App\Models\Compteur;



use Illuminate\Support\Facades\Log;


class Faire2Tours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     // Pour lancer : php artisan schedule:work
    protected $signature = 'coucou';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        // Logique d'un tour de compteur :
        // 1. Incrémenter le compteur
        // 2. Vérifier si le compteur est un multiple de 10
        // 3. Si oui, calculer le dividende
        // 4. Les commerciaux achetent des actions
        // 5. Mettre à jour le prix des actions
        // 6. Mettre à jour la quantité des actions
        
        // Incrémenter le compteur
        $compteur = Compteur::first();
        if (!$compteur) {
            $compteur = new Compteur();
            $compteur->valeur = 0;
        }
        $compteur->valeur += 1;
        $compteur->save();

        // Afficher le numéro du tour
        $tour = $compteur->valeur;
        Log::channel('myLog')->info("[SCRIPT] Debut du tour {$tour}");

        // Calcul dividende
        // Vérifier si le compteur est un multiple de 10
        if ($compteur->valeur % 10 === 0) {
            Log::channel('myLog')->info("[SCRIPT] Fonction dividende");
            
            // TODO Inserer fonction dividende

        }

        // Les commerciaux achetent des actions
        Log::channel('myLog')->info("[SCRIPT] 1/3 -> Fonction acheterAction 1/1");
        $achatAction = new CommercialController();
        $achatAction->acheteAction();

        Log::channel('myLog')->info("[SCRIPT] 1/3 -> Fonction acheterAction 2/2");
        $achatAction = new CommercialController();
        $achatAction->acheteAction();

        // Le prix des actions est mis a jour aléatoirement
        Log::channel('myLog')->info("[SCRIPT] 2/3 -> Fonction MiseAjourPrix(artisan)");
        Artisan::call('actions:mettre-a-jour-prix');

        // La quantité des actions est mis a jour aléatoirement
        Log::channel('myLog')->info("[SCRIPT] 3/3 -> Fonction quantiteAction");
        $quantiteAction = new ActionController();
        $quantiteAction->quantiteAction();

        Log::channel('myLog')->info("[SCRIPT] Fin du tour {$tour}");

        return Command::SUCCESS;
    }
}