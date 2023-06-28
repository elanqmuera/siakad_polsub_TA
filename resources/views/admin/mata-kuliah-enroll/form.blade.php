<div class="form-group{{ $errors->has('id_kelas_enroll') ? 'has-error' : ''}}">
    {!! Form::label('id_kelas_enroll', 'Kelas', ['class' => 'control-label']) !!}
    {!! Form::select('id_kelas_enroll', $kelas, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_kelas_enroll', '<p class="help-block">:message</p>') !!}
</div>
<input type="hidden" value="{{$matakuliah->id}}" name="id_mata_kuliah" />
<div class="form-group{{ $errors->has('id_dosen') ? 'has-error' : ''}}">
    {!! Form::label('id_dosen', 'Dosen', ['class' => 'control-label']) !!}
    {!! Form::select('id_dosen', $dosen, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_dosen', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
