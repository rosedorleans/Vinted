<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category_id',
        'description',
        'price',
        'address',
        'city_id',
        'photos',
        'condition_id',
        'brand',
        'model',
        'year',
        'size',
        'delivery_id',
        'warranty',
        'is_exchangeable',
        'published_at',
        'expired_at',
        'user_id'
    ];

    /**
     * Get the category user of the ad.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the city user of the ad.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    /**
     * Get the condition user of the ad.
     */
    public function condition()
    {
        return $this->belongsTo('App\Models\Condition');
    }

    /**
     * Get the delivery user of the ad.
     */
    public function delivery()
    {
        return $this->belongsTo('App\Models\Delivery');
    }

    /**
     * Get the delivery user of the ad.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
