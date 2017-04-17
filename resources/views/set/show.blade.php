@extends('layouts.app')

@section('title', 'Set: ' . $set->naam)

@section('content')
    <div class="panel-body">
        <h1>
            <a href="{{ route('mappen.show', [$set->folder]) }}">{{ $set->folder->naam }}</a>
            /
            {{ $set->naam }}
        </h1>
        <div class="btn-group">
            <a href="{{ route('sets.present', [$set, 0, 1]) }}" class="btn btn-lg btn-primary">Presenteren</a>
            <a href="{{ route('sets.edit', [$set]) }}" class="btn btn-lg btn-primary">Bewerken</a>
            <a href="{{ route('sets.delete', [$set]) }}" class="btn btn-lg btn-danger">Verwijderen</a>
        </div>
        <h2>
            <ul>
                @foreach($set->cards as $card)
                    <li>
                        <a href="{{ route('cards.show', [$card]) }}">{{ $card->begrip }}</a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('sets.addCard', [$set]) }}" class="btn btn-lg btn-primary">Toevoegen</a>
                </li>
            </ul>
        </h2>
    </div>
@endsection
