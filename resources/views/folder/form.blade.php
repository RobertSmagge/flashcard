<div class="form-group{{ $errors->has('naam') ? ' has-error' : '' }}">
    {{ Form::label('naam', 'Naam: ', ['class' => 'is-required']) }}
    {{ Form::text('naam', old('naam'), ['class' => 'form-control']) }}
    @if($errors->has('naam'))
        <span class="help-block">
            <strong>{{ $errors->first('naam') }}</strong>
        </span>
    @endif
</div>
{{ Form::submit('Opslaan', ['class'=>'btn btn-default'])}}
