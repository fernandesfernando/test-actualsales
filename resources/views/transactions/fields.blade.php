<!-- Hour Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hour', 'Hour:') !!}
    {!! Form::text('hour', null, ['class' => 'form-control','id'=>'hour']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#hour').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Deal Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deal_id', 'Deal Id:') !!}
    {!! Form::select('deal_id', $dealItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::select('client_id', $clientItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Accepted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accepted', 'Accepted:') !!}
    {!! Form::number('accepted', null, ['class' => 'form-control']) !!}
</div>

<!-- Accepted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('refused', 'Refused:') !!}
    {!! Form::number('refused', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('transactions.index') }}" class="btn btn-default">Cancel</a>
</div>
