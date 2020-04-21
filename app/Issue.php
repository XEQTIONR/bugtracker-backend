<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    //


    public function project(){

        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function type(){
        return $this->belongsTo('App\IssueType', 'type', 'id');
    }
}
