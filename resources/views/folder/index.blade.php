@extends('layouts.app')

@section('title', 'Mappen')

@section('content')
    <div class="panel-body">
        <h1>Mappen</h1>
        <ul>
            @foreach(App\Folder::all() as $folder)
                <li>
                    <a href="{{ route('mappen.show', [$folder]) }}">{{ $folder->naam }}</a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('mappen.create') }}" class="btn btn-lg btn-primary">Toevoegen</a>
            </li>
        </ul>
    </div>
@endsection
