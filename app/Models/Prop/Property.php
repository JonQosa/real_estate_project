<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    protected $table = "props";
    
    protected $fillable = [
        'title',
        'price',
        'image',
        'beds',
        'baths',
        'sq_ft',
        'home_type',
        'title',
        'year_built',
        'price_sqft',
        'more_info',
        'location',
        'city',
        'type',
        'agent_name',
    ];

    public $timestamps = true;
}
