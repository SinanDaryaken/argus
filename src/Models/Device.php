<?php

namespace Chess\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Models
{
    protected $table = 'argus_devices';
    protected $fillable = ['nane'];
    public $timestamps = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}