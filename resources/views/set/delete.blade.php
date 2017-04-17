@extends('layouts.app')

@section('title', 'Set: ' . $set->naam)

@section('content')
    <div class="panel-body">
        <h1>{{ $set->naam }}</h1>
        <p>
            Weet je zeker dat je de set {{ $set->naam }} wilt verwijderen?
        </p>
        {!! Form::open(['route' => ['sets.destroy', $set], 'method' => 'delete']) !!}
            <div class="btn-group">
                <a href="{{ route('sets.show', [$set]) }}" class="btn btn-lg btn-primary">Annuleren</a>
                {!! Form::submit('Verwijderen', ['class'=>'btn btn-lg btn-danger']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
