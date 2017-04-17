@extends('layouts.app')

@section('title', 'Flashcards')

@section('content')
    <div class="panel-body">
        <h1>Flashcards</h1>
        <ul>
            @foreach(App\Card::all() as $card)
                <li>
                    <a href="{{ route('cards.show', [$card]) }}">{{ $card->begrip }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
