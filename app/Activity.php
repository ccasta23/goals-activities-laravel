<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    
    /**
     * Get the goal that owns the activity.
     */
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

}
