<?php

namespace App\Models;

use Core\AbstractModel;

class ExtGusAndCoModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_gusandco";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "gac_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'gac_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'fk_bg_id' => [
            'type' => 'int',
            'min' => 0,
            'max' => 4294967295,
        ],
        'gac_url' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
        'gac_score' => [
            'type' => 'float',
        ],
        'gac_ithem' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'gac_igus' => [
            'type' => 'int',
            'min' => 0,
            'max' => 255,
        ],
        'gac_ecoscore' => [
            'type' => 'string',
            'maxLength' => 1,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\ExtGusAndCo[]|mixed[]
     */
    public function all()
    {
        return $this->fields('gac_id', 'fk_bg_id', 'gac_url', 'gac_score', 'gac_ithem', 'gac_igus', 'gac_ecoscore')
            ->order("fk_bg_id ASC")->select();
    }
}
