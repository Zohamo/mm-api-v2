<?php

namespace App\Models;

use Core\AbstractModel;

class PlayModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_plays";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "pla_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'pla_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'fk_bg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'pla_date' => [
            'type' => 'datetime',
        ],
        'pla_json_content' => [
            'type' => 'string',
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Play[]|mixed[]
     */
    public function all()
    {
        return $this->fields('pla_id', 'fk_bg_id', 'pla_date', 'pla_json_content')
            ->order("pla_date DESC")->select();
    }

    /**
     * Renvoie la liste de tous les modèles associés à un Boardgame.
     *
     * @param  int $bgId
     * @return mixed[]
     */
    public function allByBoardgame(int $bgId)
    {
        return array_map(
            function ($play) {
                $play = json_decode($play['pla_json_content']);
                return $play;
            },
            $this->fields('pla_id AS id', 'pla_date AS date', 'pla_json_content')
                ->where("fk_bg_id = :bgId")
                ->order("pla_date ASC")
                ->toArray()->select(['bgId' => $bgId])
        );
    }
}
