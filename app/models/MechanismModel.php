<?php

namespace App\Models;

use Core\AbstractModel;

class MechanismModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_mechanisms";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "mec_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'mec_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'mec_name' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Mechanism[]|mixed[]
     */
    public function all()
    {
        return $this->fields('mec_id', 'mec_name')
            ->order("mec_name ASC")->select();
    }
}
