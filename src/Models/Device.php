<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'argus_devices';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}