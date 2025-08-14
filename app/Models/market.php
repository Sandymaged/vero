<?php

namespace App\Models;
use App\Scopes\ServiceScope;
class market 
{

   protected $table = 'market'; // name of your table in DB
    public $timestamps = false; // disable if you don't have created_at / updated_at columns

    protected $fillable = ['name','market_cat_id','image_path'];

    public static $rules = [
        'name' => ['required', 'string'],
        'image_path' => ['required', 'string'],
        'market_cat_id' => ['required', 'integer'],
    ];

}
