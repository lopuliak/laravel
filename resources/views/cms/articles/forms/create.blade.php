<div class="form-group is-empty">
    {{ Form::label('title', 'Title',  array('class' => 'control-label')) }}
    {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
   {{ Form::label('summary', 'Summary') }}
   {{ Form::text('summary', Input::old('summary'), array('class' => 'form-control')) }}
</div>
<div class="form-group is-empty">
    {{ Form::label('content', 'Content', array('class' => 'control-label')) }}
    {{ Form::textarea('content', Input::old('content'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('seen', 1, null) }} Seen
        </label>
    </div>
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {{ Form::checkbox('active', 1, null) }} Active
        </label>
    </div>
</div>
<div class="form-group is-empty">
    {{ Form::label('seo_title', 'Seo Title') }}
    {{ Form::text('seo_title', Input::old('seo_title'), array('class' => 'form-control')) }}
</div>

<div class="form-group is-empty">
    {{ Form::label('seo_key', 'Seo seo_key') }}
    {{ Form::text('seo_key', Input::old('seo_key'), array('class' => 'form-control')) }}
</div>

<div class="form-group is-empty">
    {{ Form::label('seo_desc', 'Seo seo_desc') }}
    {{ Form::text('seo_desc', Input::old('seo_desc'), array('class' => 'form-control')) }}
</div>
<div class="form-group text-right">
    <a href="{!! url('/articles') !!}" class="btn btn-default raw-left">Cancel</a>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
