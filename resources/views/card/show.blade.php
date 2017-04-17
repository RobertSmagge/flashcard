@extends('layouts.app')

@section('title', 'Flashcard: ' . $card->begrip)

@section('content')
    <div class="panel-body">
        <h1>
            <a href="{{ route('mappen.show', [$card->getSet()->folder]) }}">{{ $card->getSet()->folder->naam }}</a>
            /
            <a href="{{ route('sets.show', [$card->getSet()]) }}">{{ $card->getSet()->naam }}</a>
            /
            {{ $card->begrip }}
        </h1>
        <div class="btn-group">
            <a href="{{ route('cards.edit', [$card]) }}" class="btn btn-lg btn-primary">Bewerken</a>
            <a href="{{ route('cards.delete', [$card]) }}" class="btn btn-lg btn-danger">Verwijderen</a>
        </div>
        <div class="form-group">
            <h2>
                {!! Form::label('begrip', 'Begrip: ') !!}
                <span>{{ $card->begrip }}</span>
            </h2>
        </div>
        <div class="form-group">
            <h3>
                {!! Form::label('omschrijving', 'Omschrijving: ') !!}
                <span>{{ $card->omschrijving }}</span>
            </h3>
        </div>
        <div class="form-group">
            <div>
                <img src="{{ config('app.url') . '/public' . $card->afbeelding->large->url }}">
            </div>
        </div>
    </div>
@endsection
