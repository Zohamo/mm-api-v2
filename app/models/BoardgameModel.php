<?php

namespace App\Models;

use Core\AbstractModel;
use Core\Entities\Relationship;

class BoardgameModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_boardgames";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'fk_bgg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'slug' => [
            'type' => 'string',
            'maxLength' => 100,
        ],
        'pre_title' => [
            'type' => 'string',
            'maxLength' => 50,
        ],
        'title' => [
            'type' => 'string',
            'maxLength' => 100,
        ],
        'post_title' => [
            'type' => 'string',
            'maxLength' => 50,
        ],
        'year' => [
            'type' => 'int',
        ],
        'min_players' => [
            'type' => 'int',
            'default' => '2',
            'min' => 0,
            'max' => 255,
        ],
        'max_players' => [
            'type' => 'int',
            'default' => '4',
            'min' => 0,
            'max' => 255,
        ],
        'min_age' => [
            'type' => 'int',
            'default' => '10',
            'min' => 0,
            'max' => 255,
        ],
        'setup_time' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'rules_time' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'play_time_min' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'play_time_max' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'fk_type_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'fk_theme_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 65535,
        ],
        'created_at' => [
            'type' => 'datetime',
            'default' => 'CURRENT_TIMESTAMP',
        ],
        'deleted_at' => [
            'type' => 'datetime',
        ],
    ];

    /**
     * Définit les relations entre ce modèle et d'autres modèles.
     *
     * @return $this
     */
    protected function setRelationships()
    {
        $this->relationships = [
            'types' => new Relationship('TypeModel', 'has-one', 'fk_type_id', 'typ_id'),
        ];
        return $this;
    }

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Boardgame[]|mixed[]
     */
    public function all()
    {
        return $this->with('types')
            ->fields('id', 'fk_bgg_id', 'slug', 'pre_title', 'title', 'post_title', 'year', 'min_players', 'max_players', 'min_age', 'setup_time', 'rules_time', 'play_time_min', 'play_time_max', 'fk_type_id', 'fk_theme_id', 'created_at', 'deleted_at', 'typ_name')
            ->order("created_at DESC")->select();
    }
}
