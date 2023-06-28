<div class="form-group{{ $errors->has('id_jadwal') ? 'has-error' : ''}}">
    {!! Form::label('id_jadwal', 'Id Jadwal', ['class' => 'control-label']) !!}
    {!! Form::number('id_jadwal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('id_jadwal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : ''}}">
    {!! Form::label('tanggal', 'Tanggal', ['class' => 'control-label']) !!}
    {!! Form::date('tanggal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
