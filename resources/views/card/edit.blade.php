@extends('layouts.app')

@section('title', 'Bewerk flashcard: ' . $card->naam)

@section('content')
    <div class="panel-body">
        {{ Form::model($card, [
            'route'  => ['cards.update', $card],
            'files'  => true,
            'method' => 'put'
        ]) }}
            @include('card.form', ['submitText' => 'Aanpassen'])
        {{ Form::close() }}
    </div>
@endsection
