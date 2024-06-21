<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dish
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Order[] $dishOrders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dish extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'price', 'category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function dishOrders()
    {
        return $this->belongsToMany(\App\Models\Order::class);
    }

}
