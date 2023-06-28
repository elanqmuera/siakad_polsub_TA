<div class="form-group{{ $errors->has('id_kelas_enroll') ? 'has-error' : ''}}">
    {!! Form::label('id_kelas_enroll', 'Kelas', ['class' => 'control-label']) !!}
    {!! Form::select('id_kelas_enroll', $kelas, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_kelas_enroll', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode_mata_kuilah') ? 'has-error' : ''}}">
    {!! Form::label('kode_mata_kuliah', 'Kode Mata Kuliah', ['class' => 'control-label']) !!}
    {!! Form::text('kode_mata_kuliah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode_mata_kuilah', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Redeem', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
