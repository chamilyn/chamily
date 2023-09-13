<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishing extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_wishings';
    public $timestamps = true;
}
