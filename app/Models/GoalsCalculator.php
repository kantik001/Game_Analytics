<?php

namespace App\Models;

class GoalsCalculator
{
    public function calculatePoints(Game $match): int
    {
        foreach ($match as $goal) {
            $match = Game::find($goal['match_id']);
            $player = Player::find($goal['player_id']);

            if ($match && $player) {
                Goal::create([
                    'match_id' => $goal['match_id'],
                    'player_id' => $goal['player_id'],
                    'goals' => $goal['goals'],
                ]);
            }
        }

        return 111;
    }

}
