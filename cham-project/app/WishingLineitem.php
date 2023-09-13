<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WishingLineitem extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_wishing_lineitems';
    public $timestamps = true;
}
