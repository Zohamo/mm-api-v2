<?php

namespace App\Models;

use Core\AbstractModel;

class ExtBggModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_bgg";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "bgg_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'bgg_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'bgg_age' => [
            'type' => 'int',
            'default' => '10',
            'min' => 0,
            'max' => 255,
        ],
        'bgg_weight' => [
            'type' => 'float',
            'maxLength' => 5,
        ],
        'bgg_average_rating' => [
            'type' => 'float',
            'maxLength' => 5,
        ],
        'bgg_play_time_min' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'bgg_play_time_max' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\ExtBgg[]|mixed[]
     */
    public function all()
    {
        return $this->fields('bgg_id', 'bgg_age', 'bgg_weight', 'bgg_average_rating', 'bgg_play_time_min', 'bgg_play_time_max')
            ->order("bgg_id ASC")->select();
    }
}
