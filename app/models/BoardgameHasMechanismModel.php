<?php

namespace App\Models;

use Core\AbstractModel;

class BoardgameHasMechanismModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_boardgame_has_mechanisms";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'fk_bg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'fk_mec_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\BoardgameHasMechanism[]|mixed[]
     */
    public function all()
    {
        return $this->fields('fk_bg_id', 'fk_mec_id')
            ->order("fk_mec_id ASC")->select();
    }
}
