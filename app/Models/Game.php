<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function getPointsAttribute(): int
    {
        return app(PointsCalculator::class)->calculatePoints($this);
    }
}
