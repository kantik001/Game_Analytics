@extends('layouts.app')

@section('content')
    <h2>Create new Match</h2>
    <form action="{{ route('games.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="format">Format:</label>
            <select name="format" id="format">
                <option

                    value="gold">Gold</option>


                <option

                    value="silver">Silver</option>


                <option

                    value="bronze">Bronze</option>


            </select>


        </div>


        <div

            class="form-group">
            <label for="teams">Teams:</label>
            <select multiple name="teams[]" id="teams">
                @foreach ($teams as $team)
                    <option

                        value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>


        </div>


        <button

            type="submit"

            class="btn btn-primary">Create</button>
    </form>
@endsection
