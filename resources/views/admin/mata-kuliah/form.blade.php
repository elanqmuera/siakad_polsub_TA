<div class="form-group{{ $errors->has('nama_mata_kuliah') ? 'has-error' : ''}}">
    {!! Form::label('nama_mata_kuliah', 'Nama Mata Kuliah', ['class' => 'control-label']) !!}
    {!! Form::text('nama_mata_kuliah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_mata_kuliah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('id_prodi') ? 'has-error' : ''}}">
    {!! Form::label('id_prodi', 'Id Prodi', ['class' => 'control-label']) !!}
    {!! Form::select('id_prodi', $prodi, $matakuliah['id_prodi'], ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_prodi', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('kode_mata_kuliah') ? 'has-error' : ''}}">
    {!! Form::label('kode_mata_kuliah', 'Kode Mata Kuliah', ['class' => 'control-label']) !!}
    {!! Form::text('kode_mata_kuliah', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode_mata_kuliah', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('sks') ? 'has-error' : ''}}">
    {!! Form::label('sks', 'Sks', ['class' => 'control-label']) !!}
    {!! Form::number('sks', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('sks', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
