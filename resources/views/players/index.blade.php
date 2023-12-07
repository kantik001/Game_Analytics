@extends('layouts.app')

@section('content')
    <h2>Player Details</h2>
    <h3>{{ $player->name }}</h3>
    <ul>
        <li>Team: {{ $player->team->name }}</li>
        <li>Total goals: {{ $player->goals->sum('goals') }}</li>
    </ul>
    <h3>Match History</h3>
    <ul>
        @foreach ($player->games as $match)
            <li>
                <a href="{{ route('games.show', $game->id) }}">
                    {{ $game->format }} - {{ $game->teams->implode('name', ', ') }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
