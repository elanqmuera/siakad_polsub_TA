<div class="form-group{{ $errors->has('id_tahun_ajaran') ? 'has-error' : ''}}">
    {!! Form::label('id_tahun_ajaran', 'Tahun Ajaran', ['class' => 'control-label']) !!}
    {!! Form::select('id_tahun_ajaran', $tahun_ajaran, $kelas['id_tahun_ajaran'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_tahun_ajaran', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('nama_kelas') ? 'has-error' : ''}}">
    {!! Form::label('nama_kelas', 'Nama Kelas', ['class' => 'control-label']) !!}
    {!! Form::text('nama_kelas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_kelas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode_kelas') ? 'has-error' : ''}}">
    {!! Form::label('kode_kelas', 'Kode Kelas', ['class' => 'control-label']) !!}
    {!! Form::text('kode_kelas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode_kelas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_prodi') ? 'has-error' : ''}}">
    {!! Form::label('id_prodi', 'Prodi', ['class' => 'control-label']) !!}
    {!! Form::select('id_prodi', $program_studi, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_prodi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_dosen_wali') ? 'has-error' : ''}}">
    {!! Form::label('id_dosen_wali', 'Dosen Wali', ['class' => 'control-label']) !!}
    {!! Form::select('id_dosen_wali', $dosen_wali, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_dosen_wali', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
