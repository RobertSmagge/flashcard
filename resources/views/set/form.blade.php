<div class="form-group{{ $errors->has('naam') ? ' has-error' : '' }}">
    {{ Form::label('naam', 'Naam: ', ['class' => 'is-required']) }}
    {{ Form::text('naam', old('naam'), ['class' => 'form-control']) }}
    @if($errors->has('naam'))
        <span class="help-block">
            <strong>{{ $errors->first('naam') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('map') ? ' has-error' : '' }}">
    {{ Form::label('map', 'Map: ', ['class' => 'is-required']) }}
    {{ Form::text('map', isset($set) ? $set->folder->naam : (isset($folder) ? $folder->naam : old('map')), ['class' => 'form-control']) }}
    @if($errors->has('map'))
        <span class="help-block">
            <strong>{{ $errors->first('map') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('folder_id') ? ' has-error' : '' }}">
    {{ Form::label('folder_id', 'Map: ', ['class' => 'is-required']) }}
    {{ Form::select('folder_id', $folders, isset($folder) ? $folder->naam : null, ['class' => 'form-control']) }}
</div>
{{ Form::submit('Opslaan', ['class'=>'btn btn-default'])}}
