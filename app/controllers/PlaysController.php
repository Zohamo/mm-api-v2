<?php

namespace App\Controllers;

use App\Models\PlayModel;
use Core\AbstractController;
use Core\View;

class PlaysController extends AbstractController
{
    /**
     * URL de la page d'accueil de la ressource.
     * @var string
     */
    protected $homeUrl = "plays";

    /**
     * Titre de la page d'accueil de la ressource.
     * @var string
     */
    public $homeTitle = "Plays";

    /**
     * Noms des actions permettant d'identifier les formulaires pour la génération de jetons CSRF.
     * @var string[]
     */
    public $actions;

    /**
     * Liens à mettre en valeur dans la barre de navigation.
     * @var string[]
     */
    protected $activeLinks = ['play'];

    /**
     * Modèle associé au contrôleur.
     * @var PlayModel
     */
    protected $model;

    /**
     * Crée une instance du contrôleur et définit ses propriétés.
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new PlayModel();
        $this->actions = ['updateOrCreate' => "updateOrCreatePlay"];
    }

    /**
     * Affiche une liste des ressources.
     *
     * @route("/plays", methods={"GET"})
     */
    public function index()
    {
        View::render(
            // Vue à utiliser dans le dossier `views`
            'plays/plays-index',
            // Paramètres à afficher dans la vue
            [
                // Titre de la page
                'title' => $this->homeTitle,
                // Liste des ressources à afficher
                'plays' => $this->model->all(),
            ],
            // Liste des modules/scripts à implémenter
            ['modules' => ['data-tables', 'form-modal']]
        );
    }

    /**
     * Affiche la page de détails de la ressource.
     *
     * @param  integer $id
     * @route("/plays/{id}", methods={"GET"})
     */
    public function detail($id)
    {
        View::render(
            // Vue à utiliser dans le dossier `views`
            'plays/plays-detail',
            // Paramètres à afficher dans la vue
            [
                // Titre de la page
                'title' => "Play #$id",
                // Fil d'Ariane
                'breadcrumbs' => [[
                    'title' => $this->homeTitle,
                    'url' => $this->homeUrl
                ]],
                // Liste des ressources à afficher
                'play' => $this->model->first($id),
            ],
            // Liste des modules/scripts à implémenter
            ['modules' => ['form-modal']]
        );
    }
}
