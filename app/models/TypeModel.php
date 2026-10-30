<?php

namespace App\Models;

use Core\AbstractModel;

class TypeModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_types";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "typ_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'typ_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'typ_name' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Type[]|mixed[]
     */
    public function all()
    {
        return $this->fields('typ_id', 'typ_name')
            ->order("typ_name ASC")->select();
    }
}
