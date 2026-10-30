<?php

namespace App\Models;

use Core\AbstractModel;

class ThemeModel extends AbstractModel
{
    /**
     * Nom de la table correspondant au modèle.
     *
     * @var string
     */
    protected string $table = "bg_themes";

    /**
     * Nom de la clé primaire de la table ou des clés composites.
     *
     * @var string|string[] ex: `uti_id` ou [`fk_uti_id`, `fk_role_id`]
     */
    protected string|array $pk = "the_id";

    /**
     * Tableau associatif d'attributs relatifs aux propriétés du modèle.
     *
     * @var array[]
     */
    protected array $attributes = [
        'the_id' => [
            'type' => 'int',
            'fillable' => false,
        ],
        'the_name' => [
            'type' => 'string',
            'maxLength' => 255,
        ],
    ];

    /**
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return \App\Entities\Theme[]|mixed[]
     */
    public function all()
    {
        return $this->fields('the_id', 'the_name')
            ->order("the_name ASC")->select();
    }
}
