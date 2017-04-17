@extends('layouts.app')

@section('title', 'Bewerk set: ' . $set->naam)

@section('content')
    <div class="panel-body">
        {{ Form::model($set, [
            'route'  => ['sets.update', $set],
            'method' => 'put'
        ]) }}
            @include('set.form', ['submitText' => 'Aanpassen'])
        {{ Form::close() }}
    </div>
@endsection
