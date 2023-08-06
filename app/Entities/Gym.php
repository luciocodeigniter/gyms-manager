<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Gym extends Entity
{
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id'     => 'integer',
        'active' => 'boolean'
    ];


    /**
     * Is activated?
     *
     * @return boolean
     */
    public function isActivated(): bool
    {

        return $this->active; // true ou false
    }

    /**
     * Renders an html badge with the academy status
     *
     * @return string
     */
    public function status(): string
    {

        return $this->isActivated() ?
            '<span class="badge badge-primary">Ativo</span>' :
            '<span class="badge badge-danger">Inativo</span>';
    }
}
