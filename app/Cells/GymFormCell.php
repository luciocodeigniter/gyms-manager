<?php

namespace App\Cells;

use App\Entities\Gym;
use CodeIgniter\View\Cells\Cell;

class GymFormCell extends Cell
{
    /** @var Gym */
    protected ?Gym $gym;

    public function getGymProperty(): ?Gym
    {
        return $this->gym;
    }
}
