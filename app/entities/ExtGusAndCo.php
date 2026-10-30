<?php

namespace App\Entities;

use Core\AbstractDTO;

class ExtGusAndCo extends AbstractDTO
{
    public int $gac_id;
    public ?int $fk_bg_id;
    public ?string $gac_url;
    public ?float $gac_score;
    public ?int $gac_ithem;
    public ?int $gac_igus;
    public ?string $gac_ecoscore;
}
