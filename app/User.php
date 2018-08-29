<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\UserAnswer;

class User extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at','updated_at','last_login'];

    protected $appends = ['address','progress'];

    public function getAddressAttribute()
    {
    	$wallet = new \NeoPHP\NeoWallet($this->private_key);

        $address = $wallet->getAddress();

        return $address;
    }

    public function getProgressAttribute()
    {
    	$progress = UserAnswer::where('user_id', $this->id)->count();

    	return $progress;
    }
}
