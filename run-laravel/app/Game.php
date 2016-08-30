<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    function member(){
        return $this->belongsToMany('App\Member', 'games_members', 'game_id', 'member_id');
    }

    function games_members(){
        return $this->hasMany('App\games_members');
    }
}
