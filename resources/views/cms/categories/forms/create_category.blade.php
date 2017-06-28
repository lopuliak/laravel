<div class="form-group is-empty">
  {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
  {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter Category Name']) !!}
</div>
<div class="form-group is-empty">
  {{ Form::label('pid', 'Parent Category:') }}
  <select class="form-control" name="pid">
      @foreach($categories as $category)
          <option value='{{ $category->id }}'>{{ $category->name }}</option>
      @endforeach
  </select>
</div>
<div class="form-group is-empty">
  {!! Form::label('sort', 'Sort order:', ['class' => 'control-label']) !!}
  {!! Form::select('sort', [0 => 'Ascending', 1 => 'Descending'], 0, ['class' => 'form-control']) !!}
</div>
<div class="form-group text-right">
    <a href="{!! url('/categories') !!}" class="btn btn-default raw-left">Cancel</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
