<?php

namespace App\Models;
use App\Scopes\ServiceScope;
class About_us 
{

   protected $table = 'brands'; // name of your table in DB
    public $timestamps = false; // disable if you don't have created_at / updated_at columns

    protected $fillable = ['name'];

    public static $rules = [
        'name' => ['required', 'string'],
        
    ];

}
