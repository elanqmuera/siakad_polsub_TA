<div class="form-group{{ $errors->has('keluhan') ? 'has-error' : '' }}">
    {!! Form::label('keluhan', 'Keluhan', ['class' => 'control-label']) !!}
    {!! Form::text(
        'keluhan',
        null,
        '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']
    ) !!}
    {!! $errors->first('keluhan', '<p class="help-block">:message</p>') !!}
</div>

<input type="hidden" name="idKelas" value="{{ $idKelas }}" />

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Tambahkan', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
