<?php

namespace Core\Api\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    protected $table = "customers";
    protected $fillable = ["uuid", "firstName", "lastName", "dateOfBirth"];

    protected $with = "products";

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
