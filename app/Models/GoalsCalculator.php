<?php

namespace App\Models;

class GoalsCalculator
{
    public function calculatePoints(Game $game): int
    {
        foreach ($game as $goal) {
            $game = Game::find($goal['game_id']);
            $player = Player::find($goal['player_id']);

            if ($game && $player) {
                Goal::create([
                    'game_id' => $goal['game_id'],
                    'player_id' => $goal['player_id'],
                    'goals' => $goal['goals'],
                ]);
            }
        }

        return 111;
    }

}
