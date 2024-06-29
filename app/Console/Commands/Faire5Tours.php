<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ActionController;

use Illuminate\Support\Facades\Log;

class Faire5Tours extends Command
{
    protected $signature = 'faireTour';
    protected $description = 'Exécuter séquentiellement plusieurs commandes Artisan';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::channel('myLog')->info("Fonction Faire5Tours ##");
        // Exécuter 5 fois la commande MettreAJourPrixActions
        for ($i = 0; $i < 5; $i++) {
            Artisan::call('actions:mettre-a-jour-prix');
            $this->info('Commande MettreAJourPrixActions exécutée ' . ($i + 1) . ' fois.');
            Log::channel('myLog')->info('Commande MettreAJourPrixActions exécutée ' . ($i + 1) . ' fois.');
        }

        // Exécuter la méthode ajusterPrix() du contrôleur ActionController
        $actionController = new ActionController();
        $actionController->ajusterPrix($actionController);
        $this->info('Méthode ajusterPrix exécutée.');
        Log::channel('myLog')->info('Méthode ajusterPrix exécutée.');
    
        

        // Exécuter 2 fois la commande MettreAJourPrixActions
        for ($i = 0; $i < 2; $i++) {
            Artisan::call('actions:mettre-a-jour-prix');
        
            Log::channel('myLog')->info('Commande MettreAJourPrixActions exécutée .');
        }

        $this->info('Toutes les commandes ont été exécutées.');
         Log::channel('myLog')->info('Toutes les commandes ont été exécutées.');
         
         
    }
}
