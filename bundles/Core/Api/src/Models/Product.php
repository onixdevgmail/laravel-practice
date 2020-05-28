<?php

namespace Core\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ["customer_id", "status", "issn", "name"];
}
