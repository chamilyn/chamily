<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SavingLineitem extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_saving_lineitems';
    public $timestamps = true;

    public function transfer()
    {
        return $this->belongsTo('App\User', 'transfer_id', 'id')->withTrashed()->withDefault();
    }
}
