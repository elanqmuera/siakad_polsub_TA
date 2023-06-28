<div class="form-group{{ $errors->has('tahun') ? 'has-error' : ''}}">
    {!! Form::label('tahun', 'Tahun', ['class' => 'control-label']) !!}
    {!! Form::number('tahun', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('semester') ? 'has-error' : ''}}">
    {!! Form::label('semester', 'Semester', ['class' => 'control-label']) !!}
    {{--  {!! Form::number('semester', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}  --}}
    <select name="semester" class="form-control" required>
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
    </select>
    {!! $errors->first('semester', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
