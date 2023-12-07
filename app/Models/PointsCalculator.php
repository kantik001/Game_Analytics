<?php

namespace App\Models;

class PointsCalculator
{
    public function calculatePoints(Game $game): int
    {
        $points = 0;

        switch ($game->format) {
            case 'gold':
                $points += 3;
                break;
            case 'silver':
                $points += 2;
                break;
            case 'bronze':
                $points += 1;
                break;
        }

        foreach ($game->goals as $player_id => $goals) {
            $points += $goals;
        }

        return $points;
    }

}
