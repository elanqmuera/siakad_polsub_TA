<div class="form-group{{ $errors->has('id_kehadiran') ? 'has-error' : ''}}">
    {!! Form::label('id_kehadiran', 'Id Kehadiran', ['class' => 'control-label']) !!}
    {!! Form::number('id_kehadiran', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_kehadiran', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_mahasiswa') ? 'has-error' : ''}}">
    {!! Form::label('id_mahasiswa', 'Id Mahasiswa', ['class' => 'control-label']) !!}
    {!! Form::number('id_mahasiswa', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_mahasiswa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    {!! Form::select('status', json_decode('{"Belum Ada Kehadiran":"Belum Ada Kehadiran","Hadir":"Hadir","Tidak Hadir":"Tidak Hadir"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
