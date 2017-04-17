@extends('layouts.app')

@section('title', 'Nieuwe set')

@section('content')
    <div class="panel-body">
        {{ Form::open(['route' => 'sets.store']) }}
            @include('set.form', ['submitText' => 'Invoeren'])
        {{ Form::close() }}
    </div>
@endsection
