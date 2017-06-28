<div class="form-group is-empty">
  {!! Form::label('name', 'Tag Name*', ['class' => 'control-label']) !!}
  {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
  <p class="help-block"></p>
  @if($errors->has('name'))
      <p class="help-block">
          {{ $errors->first('name') }}
      </p>
  @endif
</div>
<div class="form-group text-right">
    <a href="{!! url('/tags') !!}" class="btn btn-default raw-left">Cancel</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
