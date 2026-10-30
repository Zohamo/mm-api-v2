<?php

namespace App\Models;

use Core\AbstractModel;

class PlayerModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_players";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "player_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'player_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'player_name' => [
            'type' => 'string',
            'maxLength' => 50,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Player[]|mixed[]
     */
    public function all()
    {
        return $this->fields('player_id', 'player_name')
            ->order("player_name ASC")->select();
    }
}
