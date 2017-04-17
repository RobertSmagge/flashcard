@extends('layouts.app')

@section('title', 'Nieuwe map')

@section('content')
    <div class="panel-body">
        {{ Form::open(['route' => 'mappen.store']) }}
            @include('folder.form', ['submitText' => 'Invoeren'])
        {{ Form::close() }}
    </div>
@endsection
