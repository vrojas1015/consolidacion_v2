<?php

namespace App\Repositories;

use App\Models\Proyecto;
use App\Repositories\BaseRepository;

/**
 * Class ProyectoRepository
 * @package App\Repositories
 * @version June 10, 2020, 8:40 pm UTC
*/

class ProyectoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_region',
        'nombre'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proyecto::class;
    }
}
