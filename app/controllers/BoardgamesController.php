<?php

namespace App\Controllers;

use App\Models\BoardgameModel;
use Core\AbstractController;
use Core\Alert;
use Core\View;

class BoardgamesController extends AbstractController
{
    /**
     * URL de la page d'accueil de la ressource.
     * @var string
     */
    protected $homeUrl = "boardgames";

    /**
     * Titre de la page d'accueil de la ressource.
     * @var string
     */
    public $homeTitle = "Boardgames";

    /**
     * Noms des actions permettant d'identifier les formulaires pour la génération de jetons CSRF.
     * @var string[]
     */
    public $actions;

    /**
     * Liens à mettre en valeur dans la barre de navigation.
     * @var string[]
     */
    protected $activeLinks = ['boardgame'];

    /**
     * Modèle associé au contrôleur.
     * @var BoardgameModel
     */
    protected $model;

    /**
     * Crée une instance du contrôleur et définit ses propriétés.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new BoardgameModel();
        $this->actions = ['updateOrCreate' => "updateOrCreateBoardgame"];
    }

    /**
     * Affiche une liste des ressources.
     *
     * @route("/boardgames", methods={"GET"})
     */
    public function index()
    {
        View::render(
            // Vue à utiliser dans le dossier `views`
            'boardgames/boardgames-index',
            // Paramètres à afficher dans la vue
            [
                // Titre de la page
                'title' => $this->homeTitle,
                // Liste des ressources à afficher
                'boardgames' => $this->model->all(),
                // Données pour le formulaire
                'actionName' => $this->actions['updateOrCreate'],
                'types' => (new \App\Models\TypeModel)->all(),
            ],
            // Liste des modules/scripts à implémenter
            ['modules' => ['data-tables', 'form-modal']]
        );
    }

    /**
     * Affiche la page de détails de la ressource.
     *
     * @param  integer $id
     * @route("/boardgames/{id}", methods={"GET"})
     */
    public function detail($id)
    {
        View::render(
            // Vue à utiliser dans le dossier `views`
            'boardgames/boardgames-detail',
            // Paramètres à afficher dans la vue
            [
                // Titre de la page
                'title' => "Boardgame #$id",
                // Fil d'Ariane
                'breadcrumbs' => [[
                    'title' => $this->homeTitle,
                    'url' => $this->homeUrl
                ]],
                // Liste des ressources à afficher
                'boardgame' => $this->model->with('types')->first($id),
                'types' => (new \App\Models\TypeModel)->all(),
                // Données pour le formulaire
                'actionName' => $this->actions['updateOrCreate'],
                'types' => (new \App\Models\TypeModel)->all(),
            ],
            // Liste des modules/scripts à implémenter
            ['modules' => ['form-modal']]
        );
    }
}
