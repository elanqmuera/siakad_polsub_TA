<div class="form-group{{ $errors->has('id_mahasiswa') ? 'has-error' : ''}}">
    {!! Form::label('id_mahasiswa', 'Id Mahasiswa', ['class' => 'control-label']) !!}
    {!! Form::number('id_mahasiswa', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_mahasiswa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_kelas') ? 'has-error' : ''}}">
    {!! Form::label('id_kelas', 'Id Kelas', ['class' => 'control-label']) !!}
    {!! Form::number('id_kelas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_kelas', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
