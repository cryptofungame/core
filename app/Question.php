<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','answer','level_id','priority','image_source','hint','answer_image','answer_description'];

    protected $hidden = ['answer', 'created_at', 'updated_at','answer_image','answer_description'];
}
