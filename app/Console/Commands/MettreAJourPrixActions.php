<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ActionController;

class MettreAJourPrixActions extends Command
{
    protected $signature = 'actions:mettre-a-jour-prix';
    protected $description = 'Mettre à jour le prix des actions';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $controller = new ActionController();
        $controller->mettreAJourPrixActions();
    }
}