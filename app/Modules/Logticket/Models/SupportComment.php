<?php

namespace App\Modules\Logticket\Models;

use Illuminate\Database\Eloquent\Model;

class SupportComment extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
        'support_id','comment'
    ];

    public function support(){
        return $this->belongsTo('App\Modules\Logticket\Models\Support','id','id');
    }
}
