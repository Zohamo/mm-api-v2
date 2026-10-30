<?php

namespace App\Entities;

use Core\AbstractDTO;

class BoardgameHasMechanism extends AbstractDTO
{
    public int $fk_bg_id;
    public int $fk_mec_id;
}
