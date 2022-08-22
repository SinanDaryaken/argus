<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Cookie extends Model
{
    protected $table = 'argus_cookies';
    protected $guarded = ['id'];
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;

    public function browser()
    {
        return $this->belongsTo(Browser::class);
    }

    public function  device()
    {
        return $this->belongsTo(Device::class);
    }

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
