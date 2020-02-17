<?php

namespace App\Modules\Logticket\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
         'status','user_id','category_id', 'reference','description','address_address','address_latitude','address_longitude','start_date','end_date'
    ];

public function user(){
    return $this->belongsTo('App\User','user_id','id');
}

    public function comments()
    {
        return $this->hasMany('App\Module\Logticket\Models\SupportComment','support_id','id');
    }
}
