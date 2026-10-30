<?php

namespace App\Controllers;

use App\Models\PlayModel;

class PlaysControllerApi
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
}
