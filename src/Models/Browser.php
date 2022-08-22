<?php

namespace Chess\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Browser extends Model
{
    protected $table = 'argus_browser';
    protected $fillable = ['name'];
    public $timestamp = false;

    public function cookies()
    {
        return $this->hasMany(Cookie::class);
    }
}