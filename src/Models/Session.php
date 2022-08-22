<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = 'argus_sessions';
    protected $guarded = ['id'];
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;

    public function cookie()
    {
        return $this->belongsTo(Cookie::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}