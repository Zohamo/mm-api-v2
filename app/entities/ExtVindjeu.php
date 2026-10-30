<?php

namespace App\Entities;

use Core\AbstractDTO;

class ExtVindjeu extends AbstractDTO
{
    public int $vj_id;
    public ?int $fk_bg_id;
    public ?string $vj_url;
    public ?float $vj_note;
    public ?string $vj_categorie;
    public ?int $vj_tps_mise_en_place;
    public ?int $vj_tps_regles;
    public ?int $vj_tps_partie;
    public ?int $vj_tps_joueur;
    public ?int $vj_meilleur_score;
}
