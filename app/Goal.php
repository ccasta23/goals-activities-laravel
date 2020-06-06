<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    /**
     * Get the activities for the goal.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    
}
