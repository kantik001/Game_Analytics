<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'team_id' => 'required|exists:teams,id',
        ]);

        Player::create($request->all());
        return redirect()->route('players.index')->with('success', 'Player created successfully');
    }

    public function show(Player $player)
    {
        $matches = $player->games;
        return view('players.show', compact('player', 'games'));
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }

    public function update(Request $request, Player $player)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'team_id' => 'required|exists:teams,id',
        ]);

        $player->update($request->all());
        return redirect()->route('players.index')->with('success', 'Player updated successfully');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success', 'Player deleted successfully');
    }
}
