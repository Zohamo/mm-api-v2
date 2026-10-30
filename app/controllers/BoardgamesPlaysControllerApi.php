<?php

namespace App\Controllers;

use App\Functions\HttpUtils;
use App\Models\BoardgameModel;
use App\Models\PlayModel;

class BoardgamesPlaysControllerApi
{
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
        $this->model = new PlayModel();
    }

    /**
     * Renvoie la ressource spécifiée.
     *
     * @param  string $slug
     * @route("/boardgames/{slug}/plays", methods={"GET"})
     */
    public function getAllByBoardgame(string $slug)
    {
        $bg = (new BoardgameModel())->fields('id')->toArray()->first('slug', $slug);
        if (empty($bg)) {
            HttpUtils::jsonResponse(null, 404);
        } else {
            HttpUtils::jsonResponse($this->model->allByBoardgame($bg['id']));
        }
    }
}
