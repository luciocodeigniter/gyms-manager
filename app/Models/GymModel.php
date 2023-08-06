<?php

namespace App\Models;

use App\Entities\Gym;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Model;

class GymModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gyms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Gym::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone',
        'manager',
        'address',
        'number_students',
        'active',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapeXSS'];
    protected $beforeUpdate   = ['escapeXSS'];



    /**
     * Escapes data before persisting helps prevent XSS attacks
     *
     * @param array $data
     * @return array
     */
    protected function escapeXSS(array $data): array
    {

        if (!isset($data['data'])) {

            return $data;
        }

        return esc($data);
    }


    /**
     * Find a gym from database
     *
     * @param integer $id
     * @throws PageNotFoundException
     * @return Gym
     */
    public function findOrFail(int $id): Gym
    {
        $gym = $this->find($id);

        if ($gym === null) {

            throw new PageNotFoundException("Gym {$id} not found");
        }

        return $gym;
    }
}
