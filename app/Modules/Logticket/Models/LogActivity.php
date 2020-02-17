<?php

namespace App\Modules\Logticket\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
        'status','user_id','support_id', 'reference','address_address','address_latitude','address_longitude','start_date','end_date'
    ];

    public function agent(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
