<?php

namespace App\Models;

class PointsCalculator
{
    public function calculatePoints(Game $match): int
    {
        $points = 0;

        switch ($match->format) {
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

        foreach ($match->goals as $player_id => $goals) {
            $points += $goals;
        }

        return $points;
    }

}
