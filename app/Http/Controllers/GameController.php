<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{


    public function index()
    {
        return view('games.index');
    }

    public function create()
    {
        $teams = Team::all();
        return view('games.create', compact('teams'));
    }

    public function store(Request $request):RedirectResponse
    {
        $this->validate($request, [
            'format' => 'required|in:gold,silver,bronze',
            'teams' => 'required|array|min:2',
        ]);

        $game = Game::create([
            'format' => $request->format,
            'teams' => json_encode($request->teams),
        ]);

        return redirect()->route('games.index')->with('success', 'Match created successfully');
    }

    public function show(Game $game)
    {
        return view('games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $teams = Team::all();
        return view('games.edit', compact('game', 'teams'));
    }

    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'format' => 'required|in:gold,silver,bronze',
            'teams' => 'required|array|min:2',
        ]);

        $game->update([
            //'format' => $request->format,
            'teams' => json_encode($request->teams),
        ]);

        return redirect()->route('games.index')->with('success', 'Match updated successfully');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Match deleted successfully');
    }

    public function markCompleted(Game $game)
    {
        $game->update(['completed' => true]);
        return redirect()->route('games.index')->with('success', 'Match marked as completed');
    }
}
