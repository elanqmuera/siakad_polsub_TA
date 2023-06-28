<div class="form-group{{ $errors->has('kategori_tugas') ? 'has-error' : ''}}">
    {!! Form::label('kategori_tugas', 'Kategori Tugas', ['class' => 'control-label']) !!}
    <select class="form-control" name="kategori_tugas" required>
        <option value="Tugas/Kuis">Tugas / Kuis</option>
        <option value="UTS">UTS</option>
        <option value="UAS">UAS</option>
    </select>
    {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
