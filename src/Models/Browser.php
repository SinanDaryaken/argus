<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Browser extends Model
{
    protected $table = 'argus_browsers';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}