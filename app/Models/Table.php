<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Table
 *
 * @property $id
 * @property $capacity
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Table extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['capacity'];


}
