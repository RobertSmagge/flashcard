<div class="form-group{{ $errors->has('begrip') ? ' has-error' : '' }}">
    {{ Form::label('begrip', 'Begrip: ', ['class' => 'is-required']) }}
    {{ Form::text('begrip', old('begrip'), ['class' => 'form-control']) }}
    @if($errors->has('begrip'))
        <span class="help-block">
            <strong>{{ $errors->first('begrip') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('omschrijving') ? ' has-error' : '' }}">
    {{ Form::label('omschrijving', 'Omschrijving: ', ['class' => 'is-required']) }}
    {{ Form::text('omschrijving', old('omschrijving'), ['class' => 'form-control']) }}
    @if($errors->has('omschrijving'))
        <span class="help-block">
            <strong>{{ $errors->first('omschrijving') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('afbeelding') || $errors->has('url') ? ' has-error' : '' }}">
    {{ Form::label('afbeelding', 'Afbeelding: ', ['class' => 'is-required']) }}
    {{-- Form::file('afbeelding') --}}
    {{ Form::text('url', old('url'), ['class' => 'form-control']) }}
    @if($errors->has('afbeelding'))
        <span class="help-block">
            <strong>{{ $errors->first('afbeelding') }}</strong>
        </span>
    @endif
    @if($errors->has('url'))
        <span class="help-block">
            <strong>{{ $errors->first('url') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('set') ? ' has-error' : '' }}">
    {{ Form::label('set', 'Set: ', ['class' => 'is-required']) }}
    {{ Form::text('set', isset($card) ? $card->sets->first()->naam : (isset($set) ? $set->naam : old('set')), ['class' => 'form-control']) }}
    @if($errors->has('set'))
        <span class="help-block">
            <strong>{{ $errors->first('set') }}</strong>
        </span>
    @endif
</div>
{{ Form::submit('Opslaan', ['class'=>'btn btn-default'])}}
