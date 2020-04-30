
<h3 class="card-title">Filters</h3>

<!-- Deal Id Field -->
{{ Form::open(['route' => 'search', 'method' => 'GET'])}}
    <div class="form-group col-sm-6">
        {!! Form::label('deal_id', 'Deal:') !!}
        {!! Form::select('deal_id', $dealItems, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Client Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('client_id', 'Client:') !!}
        {!! Form::select('client_id', $clientItems, null, ['class' => 'form-control']) !!}
    </div>

    <!-- Deal Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('starting_date', 'Starting Date:') !!}
        {!! Form::text('starting_date', null, ['class' => 'form-control', 'id' => 'starting_date']) !!}
    </div>

    <!-- Deal Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('final_date', 'Starting Date:') !!}
        {!! Form::text('final_date', null, ['class' => 'form-control', 'id' => 'final_date']) !!}
    </div>

    @push('scripts')
        <script type="text/javascript">
            $('#starting_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: true
            })
            $('#final_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush
    
    <div class="form-group col-sm-12">
        {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}

