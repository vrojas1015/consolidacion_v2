<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proyecto
 * @package App\Models
 * @version June 10, 2020, 8:40 pm UTC
 *
 * @property \App\Models\Region $idRegion
 * @property \Illuminate\Database\Eloquent\Collection $gerentes
 * @property \Illuminate\Database\Eloquent\Collection $operaciones
 * @property integer $id_region
 * @property string $nombre
 */
class Proyecto extends Model
{
    use SoftDeletes;

    public $table = 'proyecto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_region',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_region' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_region' => 'required',
        'nombre' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idRegion()
    {
        return $this->belongsTo(\App\Models\Region::class, 'id_region');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function gerentes()
    {
        return $this->hasMany(\App\Models\Gerente::class, 'id_proyecto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operaciones()
    {
        return $this->hasMany(\App\Models\Operacione::class, 'id_proyecto');
    }
}
