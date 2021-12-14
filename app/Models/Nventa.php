<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nventa
 *
 * @property $id
 * @property $descripcion
 * @property $precio
 * @property $cantidad
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nventa extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'precio' => 'required',
		'cantidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','precio','cantidad'];



}
