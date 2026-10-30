<?php

namespace App\Models;

use App\Functions\StringUtils;
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
     * Renvoie la liste des tous les modèles enregistrés.
     *
     * @return mixed[]
     */
    public function all()
    {
        return array_map(
            function ($bg) {
                $bg['players'] = ['min' => $bg['min_players'], 'max' => $bg['max_players']];
                $bg['duration'] = ['min' => $bg['play_time_min'], 'max' => $bg['play_time_max']];
                foreach (['min_players', 'max_players', 'play_time_min', 'play_time_max'] as $key) {
                    unset($bg[$key]);
                }
                return $bg;
            },
            $this
                ->fields('id', 'fk_bgg_id AS fkBggId', 'slug', 'pre_title AS preTitle', 'title', 'post_title AS postTitle', 'year', 'min_players', 'max_players', 'min_age AS age', 'setup_time AS setupTime', 'rules_time AS rulesTime', 'play_time_min', 'play_time_max', 'created_at AS createdAt', 'the_name AS theme', 'typ_name AS type', 'bgg_weight AS bggWeight')
                ->leftJoin('bg_themes', 'bg_themes.the_id = bg_boardgames.fk_theme_id')
                ->leftJoin('bg_types', 'bg_types.typ_id = bg_boardgames.fk_type_id')
                ->leftJoin('bg_bgg', 'bg_bgg.bgg_id = bg_boardgames.fk_bgg_id')
                ->where('deleted_at IS NULL')
                ->order('bgg_weight', 'min_age', 'play_time_min', 'play_time_max', 'title')
                ->toArray()->select()
        );
    }

    /**
     * Renvoie la liste des tous les modèles enregistrés avec toutes les relations.
     *
     * @return mixed[]
     */
    public function allFull()
    {
        return array_map(
            function ($bg) {
                $bg['players'] = ['min' => $bg['min_players'], 'max' => $bg['max_players']];
                $bg['duration'] = ['min' => $bg['play_time_min'], 'max' => $bg['play_time_max']];
                foreach (['bgg_id', 'bgg_age', 'bgg_weight', 'bgg_average_rating'] as $key) {
                    $bg['bgg'][StringUtils::camel(substr($key, 4))] = $bg[$key];
                }
                $bg['bgg']['duration'] = ['min' => $bg['bgg_play_time_min'], 'max' => $bg['bgg_play_time_max']];
                foreach (['dpc_url', 'dpc_note'] as $key) {
                    $bg['depuncheur'][StringUtils::camel(substr($key, 4))] = $bg[$key];
                }
                foreach (['gac_url', 'gac_score', 'gac_ithem', 'gac_igus', 'gac_ecoscore'] as $key) {
                    $bg['gusandco'][StringUtils::camel(substr($key, 4))] = $bg[$key];
                }
                foreach (['vj_url', 'vj_note', 'vj_categorie', 'vj_tps_mise_en_place', 'vj_tps_regles', 'vj_tps_partie', 'vj_tps_joueur', 'vj_meilleur_score'] as $key) {
                    $bg['vindjeu'][StringUtils::camel(substr($key, 3))] = $bg[$key];
                }
                foreach (['min_players', 'max_players', 'play_time_min', 'play_time_max', 'bgg_id', 'bgg_age', 'bgg_weight', 'bgg_average_rating', 'bgg_play_time_min', 'bgg_play_time_max', 'dpc_url', 'dpc_note', 'gac_url', 'gac_score', 'gac_ithem', 'gac_igus', 'gac_ecoscore', 'vj_url', 'vj_note', 'vj_categorie', 'vj_tps_mise_en_place', 'vj_tps_regles', 'vj_tps_partie', 'vj_tps_joueur', 'vj_meilleur_score'] as $key) {
                    unset($bg[$key]);
                }
                return $bg;
            },
            $this
                ->fields('id', 'fk_bgg_id AS fkBggId', 'slug', 'pre_title AS preTitle', 'title', 'post_title AS postTitle', 'year', 'min_players', 'max_players', 'min_age AS age', 'setup_time AS setupTime', 'rules_time AS rulesTime', 'play_time_min', 'play_time_max', 'created_at AS createdAt', 'the_name AS theme', 'typ_name AS type', 'bgg_weight AS bggWeight', 'bg_mechanisms.mechanisms AS mechanisms', 'bg_bgg.*', 'dpc_url', 'dpc_note', 'gac_url', 'gac_score', 'gac_ithem', 'gac_igus', 'gac_ecoscore', 'vj_url', 'vj_note', 'vj_categorie', 'vj_tps_mise_en_place', 'vj_tps_regles', 'vj_tps_partie', 'vj_tps_joueur', 'vj_meilleur_score')
                ->leftJoin('bg_themes', 'bg_themes.the_id = bg_boardgames.fk_theme_id')
                ->leftJoin('bg_types', 'bg_types.typ_id = bg_boardgames.fk_type_id')
                ->leftJoin('bg_bgg', 'bg_bgg.bgg_id = bg_boardgames.fk_bgg_id')
                ->leftJoin('(SELECT bhm.fk_bg_id, GROUP_CONCAT(DISTINCT m.mec_name ORDER BY m.mec_name SEPARATOR ", ") AS mechanisms FROM bg_boardgame_has_mechanisms bhm JOIN bg_mechanisms m ON m.mec_id = bhm.fk_mec_id GROUP BY bhm.fk_bg_id) AS bg_mechanisms', 'bg_mechanisms.fk_bg_id = bg_boardgames.id')
                ->leftJoin('bg_depuncheur', 'bg_depuncheur.fk_bg_id = bg_boardgames.id')
                ->leftJoin('bg_gusandco', 'bg_gusandco.fk_bg_id = bg_boardgames.id')
                ->leftJoin('bg_vindjeu', 'bg_vindjeu.fk_bg_id = bg_boardgames.id')
                ->where('deleted_at IS NULL')
                ->order('bgg_weight', 'min_age', 'play_time_min', 'play_time_max', 'title')
                ->toArray()->select()
        );
    }
}
