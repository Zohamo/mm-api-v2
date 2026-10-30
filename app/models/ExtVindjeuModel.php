<?php

namespace App\Models;

use Core\AbstractModel;

class ExtVindjeuModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_vindjeu";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "vj_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'vj_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'fk_bg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'vj_url' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
        'vj_note' => [
            'type' => 'float',
        ],
        'vj_categorie' => [
            'type' => 'string',
            'maxLength' => 50,
        ],
        'vj_tps_mise_en_place' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'vj_tps_regles' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'vj_tps_partie' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'vj_tps_joueur' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'vj_meilleur_score' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\ExtVindjeu[]|mixed[]
     */
    public function all()
    {
        return $this->fields('vj_id', 'fk_bg_id', 'vj_url', 'vj_note', 'vj_categorie', 'vj_tps_mise_en_place', 'vj_tps_regles', 'vj_tps_partie', 'vj_tps_joueur', 'vj_meilleur_score')
            ->order("vj_id ASC")->select();
    }
}
