<?php

namespace App\Entities;

use Core\AbstractDTO;

class Boardgame extends AbstractDTO
{
    public int $id;
    public int $fk_bgg_id;
    public string $slug;
    public ?string $pre_title;
    public string $title;
    public ?string $post_title;
    public int $year;
    public int $min_players;
    public ?int $max_players;
    public ?int $min_age;
    public ?int $setup_time;
    public ?int $rules_time;
    public ?int $play_time_min;
    public ?int $play_time_max;
    public int $fk_type_id;
    public int $fk_theme_id;
    public string $created_at;
    public ?string $deleted_at;
    public Type $types;

    /**
     * Définit les relations de l'objet.
     *
     * @return void
     */
    public function __construct()
    {
        $this->types = new Type();
    }
}
