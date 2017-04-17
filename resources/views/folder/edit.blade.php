@extends('layouts.app')

@section('title', 'Bewerk map: ' . $folder->naam)

@section('content')
    <div class="panel-body">
        {{ Form::model($folder, [
            'route'  => ['mappen.update', $folder],
            'method' => 'put'
        ]) }}
            @include('folder.form', ['submitText' => 'Aanpassen'])
        {{ Form::close() }}
    </div>
@endsection
