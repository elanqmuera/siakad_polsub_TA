<div class="form-group{{ $errors->has('id_jurusan') ? 'has-error' : ''}}">
    {!! Form::label('id_jurusan', 'Jurusan', ['class' => 'control-label']) !!}
    {!! Form::select('id_jurusan', $jurusan, $programstudi['id_jurusan'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_jurusan', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('nama_prodi') ? 'has-error' : ''}}">
    {!! Form::label('nama_prodi', 'Nama Prodi', ['class' => 'control-label']) !!}
    {!! Form::text('nama_prodi', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_prodi', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
