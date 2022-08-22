<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model
{
    protected $table = 'argus_operating_systems';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}