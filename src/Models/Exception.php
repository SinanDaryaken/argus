<?php

namespace Daryakenari\Argus\Models;

use Illuminate\Database\Eloquent\Model;

class Exception extends Model
{
    protected $table = 'argus_exceptions';
    protected $guarded = ['id'];
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;
}