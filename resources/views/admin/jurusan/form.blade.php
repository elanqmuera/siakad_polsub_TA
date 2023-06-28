<div class="form-group{{ $errors->has('nama_jurusan') ? 'has-error' : ''}}">
    {!! Form::label('nama_jurusan', 'Nama Jurusan', ['class' => 'control-label']) !!}
    {!! Form::text('nama_jurusan', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_jurusan', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
