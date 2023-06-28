<div class="form-group{{ $errors->has('kode_kelas') ? 'has-error' : ''}}">
    {!! Form::label('kode_kelas', 'Kode Kelas', ['class' => 'control-label']) !!}
    {!! Form::text('kode_kelas', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('kode_kelas', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Redeem', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
