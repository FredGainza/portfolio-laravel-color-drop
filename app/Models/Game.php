<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id', 'level_id', 'score_level',
      ];


    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
