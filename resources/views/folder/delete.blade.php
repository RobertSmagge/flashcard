@extends('layouts.app')

@section('title', 'Map: ' . $folder->naam)

@section('content')
    <div class="panel-body">
        <h1>{{ $folder->naam }}</h1>
        <p>
            Weet je zeker dat je de map {{ $folder->naam }} wilt verwijderen?
        </p>
        {!! Form::open(['route' => ['mappen.destroy', $folder], 'method' => 'delete']) !!}
            <div class="btn-group">
                <a href="{{ route('mappen.show', [$folder]) }}" class="btn btn-lg btn-primary">Annuleren</a>
                {!! Form::submit('Verwijderen', ['class'=>'btn btn-lg btn-danger']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
