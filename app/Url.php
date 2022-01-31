<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['url', 'status_code', 'response','user_id'];

    public $timestamps = true;
}
