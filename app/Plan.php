<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['title','amount','type','coins'];
    protected $hidden = ['created_at', 'updated_at'];
}
