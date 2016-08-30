<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    function game(){
        return $this->belongsToMany('App\Game', 'games_members', 'member_id', 'game_id');
    }

    function games_members(){
        return $this->hasMany('App\games_members');
    }
}
