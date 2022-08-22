<?php

namespace Daryakenari\Argus\Models;

use Illunminate\Database\Eloqeunt\Model;

class OperatingSystem extends Model
{
    protected $table = 'argus_operating_systems';
    protected $fillable = ['id'];
    public $timestamps = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}