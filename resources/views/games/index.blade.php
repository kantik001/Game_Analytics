@extends('layouts.app')

@section('content')
    <h2>Match Details</h2>
    <ul>
        <li>Format: {{ $game->format }}</li>
        <li>Teams:
            <ul>
                @foreach ($game->teams as $team)
                    <li>{{ $team->name }}</li>
                @endforeach
            </ul>
        </li>
        <li>Goals:</li>
        @foreach ($game->goals as $goal)
            <li>
                {{ $goal->player->name }}: {{ $goal->goals }} goals
            </li>
        @endforeach
    </ul>
@endsection
