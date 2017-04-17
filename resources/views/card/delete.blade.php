@extends('layouts.app')

@section('title', 'Flashcard: ' . $card->begrip)

@section('content')
    <div class="panel-body">
        <h1>{{ $card->begrip }}</h1>
        <p>
            Weet je zeker dat je de flashcard {{ $card->begrip }} wilt verwijderen?
        </p>
        {!! Form::open(['route' => ['cards.destroy', $card], 'method' => 'delete']) !!}
            <div class="btn-group">
                <a href="{{ route('cards.show', [$card]) }}" class="btn btn-lg btn-primary">Annuleren</a>
                {!! Form::submit('Verwijderen', ['class'=>'btn btn-lg btn-danger']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
