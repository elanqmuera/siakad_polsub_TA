<div class="form-group{{ $errors->has('id_mata_kuliah_enroll') ? 'has-error' : ''}}">
    {!! Form::label('id_mata_kuliah_enroll', 'Mata Kuliah', ['class' => 'control-label']) !!}
    {!! Form::select('id_mata_kuliah_enroll', $matkul, $jadwal['id_mata_kuliah'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_mata_kuliah_enroll', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('hari') ? 'has-error' : ''}}">
    {!! Form::label('hari', 'Hari', ['class' => 'control-label']) !!}
    {!! Form::select('hari', json_decode('{"Senin":"Senin","Selasa":"Selasa","Rabu":"Rabu","Kamis":"Kamis","Jumat":"Jumat","Sabtu":"Sabtu"}', true), null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('hari', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jam_mulai') ? 'has-error' : ''}}">
    {!! Form::label('jam_mulai', 'Jam Mulai', ['class' => 'control-label']) !!}
    {!! Form::input('time', 'jam_mulai', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('jam_mulai', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jam_selesai') ? 'has-error' : ''}}">
    {!! Form::label('jam_selesai', 'Jam Selesai', ['class' => 'control-label']) !!}
    {!! Form::input('time', 'jam_selesai', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('jam_selesai', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
