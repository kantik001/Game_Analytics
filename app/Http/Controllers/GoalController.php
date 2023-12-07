<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'game_id' => 'required|exists:games,id',
            'player_id' => 'required|exists:players,id',
            'goals' => 'required|integer|min:1',
        ]);

        Goal::create($request->all());
        return redirect()->route('games.show', $request->game_id)->with('success', 'Goal added successfully');
    }

    public function update(Request $request, Goal $goal)
    {
        $this->validate($request, [
            'goals' => 'required|integer|min:1',
        ]);

        $goal->update($request->all());
        return redirect()->route('games.show', $goal->game_id)->with('success', 'Goal updated successfully');
    }

    public function destroy(Goal $goal)
    {
        $game_id = $goal->game_id;
        $goal->delete();
        return redirect()->route('games.show', $game_id)->with('success', 'Goal deleted successfully');
    }
}
