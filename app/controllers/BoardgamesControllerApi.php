<?php

namespace App\Controllers;

use App\Functions\HttpUtils;
use App\Models\BoardgameModel;

class BoardgamesControllerApi
{
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
        $this->model = new BoardgameModel();
    }

    /**
     * Renvoie une liste de toutes les ressources.
     *
     * @route("/boardgames", methods={"GET"})
     */
    public function getAll(array $req)
    {
        HttpUtils::jsonResponse($this->model->all());
    }

    /**
     * Renvoie la ressource spécifiée.
     *
     * @param  string $slug
     * @route("/boardgames/{slug}", methods={"GET"})
     */
    public function get(string $slug)
    {
        $res = $this->model->first($slug);
        if (empty($res)) {
            HttpUtils::jsonResponse(null, 404);
        } else {
            HttpUtils::jsonResponse($res);
        }
    }
}
