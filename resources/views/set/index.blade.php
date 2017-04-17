@extends('layouts.app')

@section('title', 'Sets')

@section('content')
    <div class="panel-body">
        <h1>Sets</h1>
        <ul>
            @foreach(App\Set::all() as $set)
                <li>
                    <a href="{{ route('sets.show', [$set]) }}">{{ $set->naam }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
