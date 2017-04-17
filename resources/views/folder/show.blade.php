@extends('layouts.app')

@section('title', 'Map: ' . $folder->naam)

@section('content')
    <div class="panel-body">
        <h1>{{ $folder->naam }}</h1>
        <div class="btn-group">
            <a href="{{ route('mappen.edit', [$folder]) }}" class="btn btn-lg btn-primary">Bewerken</a>
            <a href="{{ route('mappen.delete', [$folder]) }}" class="btn btn-lg btn-danger">Verwijderen</a>
        </div>
        <ul>
            @foreach($folder->sets as $set)
                <li>
                    <a href="{{ route('sets.show', [$set]) }}">{{ $set->naam }}</a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('mappen.addSet', [$folder]) }}" class="btn btn-lg btn-primary">Toevoegen</a>
            </li>
        </ul>
    </div>
@endsection
