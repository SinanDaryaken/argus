<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'argus_visits';
    protected $guarded = ['id'];
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;
    protected $casts = ['utm' => 'array'];

    public function cookie()
    {
        return $this->belongsTo(Cookie::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
