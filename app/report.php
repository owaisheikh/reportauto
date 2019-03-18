<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $fillable = [
        'project_name', 'project_description', 'no_of_hours_spend',
        'no_of_total_hours','time_in','time_out','no_of_hours_in_office',
        'no_of_hour_out_of_office','owner_id',

    ];
    public function user(){

       return $this->belongsTo(user::class,'owner_id','id');
    }
}
