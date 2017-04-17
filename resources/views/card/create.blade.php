@extends('layouts.app')

@section('title', 'Nieuwe flashcard')

@section('content')
    <div class="panel-body">
        {{ Form::open([
            'route' => 'cards.store',
            'files'  => true,
        ]) }}
            @include('card.form', ['submitText' => 'Invoeren'])
        {{ Form::close() }}
    </div>
@endsection
