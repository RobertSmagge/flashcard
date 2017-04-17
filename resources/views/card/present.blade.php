@extends('layouts.app')

@section('title', 'Flashcard: ' . $card->begrip)

@section('content')
    <div class="panel-body">
        <div>
            <h1 class="text-center">
                @if($part == 3)
                    {{ $card->begrip }}
                @else
                    -
                @endif
            </h1>
        </div>
        <div class="js-afbeelding">
            <a href="{{ route('sets.present', [$set, $order, $part+1]) }}">
                <img src="{{ config('app.url') . '/public' . $card->afbeelding->medium->url }}" class="img-responsive center-block">
            </a>
        </div>
        <h2 class="text-center">
            @if($part > 1)
                {{ $card->omschrijving }}
            @else
                -
            @endif
        </h2>
    </div>
    <div class="panel-footer clearfix">
        <a href="{{ route('sets.present', [$set, $order, $part-1]) }}" class="btn btn-primary pull-left">Vorige</a>
        <a href="{{ route('sets.present', [$set, $order, $part+1]) }}" class="btn btn-primary pull-right">Volgende</a>
    </div>
@endsection
