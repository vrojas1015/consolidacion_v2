<?php

namespace App\Repositories;

use App\Models\Region;
use App\Repositories\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version June 10, 2020, 8:40 pm UTC
*/

class RegionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'identificador'
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
        return Region::class;
    }
}
