@extends('layouts.app')

@section('content')
    <h2>{{ $game->name }}</h2>
    <ul>
        <li>Start Date: {{ $game->start_date }}</li>
        <li>End Date: {{ $game->end_date }}</li>
        <li>Teams:</li>
        <ul>
            @foreach ($game->teams as $team)
                <li>{{ $team->name }}</li>
            @endforeach
        </ul>
    </ul>
    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Edit</a>
@endsection
