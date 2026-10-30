<?php

namespace App\Entities;

use Core\AbstractDTO;

class ExtDepuncheur extends AbstractDTO
{
    public int $dpc_id;
    public int $fk_bg_id;
    public ?string $dpc_url;
    public ?int $dpc_note;
}
