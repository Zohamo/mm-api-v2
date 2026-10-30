<?php

namespace App\Entities;

use Core\AbstractDTO;

class Play extends AbstractDTO
{
    public int $pla_id;
    public int $fk_bg_id;
    public ?string $pla_date;
    public string $pla_json_content;
}
