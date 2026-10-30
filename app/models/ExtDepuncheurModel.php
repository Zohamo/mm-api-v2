<?php

namespace App\Models;

use Core\AbstractModel;

class ExtDepuncheurModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_depuncheur";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "dpc_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'dpc_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'fk_bg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'dpc_url' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
        'dpc_note' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\ExtDepuncheur[]|mixed[]
     */
    public function all()
    {
        return $this->fields('dpc_id', 'fk_bg_id', 'dpc_url', 'dpc_note')
            ->order("dpc_id ASC")->select();
    }
}
