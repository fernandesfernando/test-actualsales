<!-- Hour Field -->
<div class="form-group">
    {!! Form::label('hour', 'Hour:') !!}
    <p>{{ $transaction->hour }}</p>
</div>

<!-- Deal Id Field -->
<div class="form-group">
    {!! Form::label('deal_id', 'Deal Id:') !!}
    <p>{{ $transaction->deal_id }}</p>
</div>

<!-- Client Id Field -->
<div class="form-group">
    {!! Form::label('client_id', 'Client Id:') !!}
    <p>{{ $transaction->client_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $transaction->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $transaction->updated_at }}</p>
</div>

