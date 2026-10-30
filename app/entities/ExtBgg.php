<?php

namespace App\Entities;

use Core\AbstractDTO;

class ExtBgg extends AbstractDTO
{
    public int $bgg_id;
    public ?int $bgg_age;
    public ?float $bgg_weight;
    public ?float $bgg_average_rating;
    public ?int $bgg_play_time_min;
    public ?int $bgg_play_time_max;
}
