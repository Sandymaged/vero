<?php

namespace App\Models;
use App\Scopes\ServiceScope;
class About_us 
{

   protected $table = 'about_us'; // name of your table in DB
    public $timestamps = false; // disable if you don't have created_at / updated_at columns

    protected $fillable = ['name','title'];

    public static $rules = [
        'name' => ['required', 'string'],
        'title' => ['required', 'string'],
        
    ];

}
