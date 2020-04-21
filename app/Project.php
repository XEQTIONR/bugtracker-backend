<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    public function issues(){

        return $this->hasMany('App\Issue', 'project_id', 'id');
    }
}
