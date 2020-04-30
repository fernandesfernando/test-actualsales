
<h3 class="card-title">Filters</h3>

<!-- Deal Id Field -->
{{ Form::open(['route' => 'search', 'method' => 'GET'])}}
    

    <!-- Client Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('client_id', 'Client:') !!}
        {!! Form::select('client_id', [null=>'Please Select'] + $clientItems, request()->client_id, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('deal_id', 'Deal:') !!}
        {!! Form::select('deal_id', [null=>'Please Select'] + $dealItems, request()->deal_id, ['class' => 'form-control']) !!}
    </div>

    <!-- Deal Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('start_date', 'Start Date:') !!}
        {!! Form::text('start_date', request()->start_date, ['class' => 'form-control', 'id' => 'start_date']) !!}
    </div>

    <!-- Deal Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('final_date', 'Final Date:') !!}
        {!! Form::text('final_date', request()->final_date, ['class' => 'form-control', 'id' => 'final_date']) !!}
    </div>

    <!-- Values of checkboxes are using SQL pattern to order by to specific timestamp piece -->
    <div class="form-group col-sm-3">
        {!! Form::label('order_hour', 'Group by Hour:') !!}
        {!! Form::checkbox('order_hour', 'TIME(hour)', request()->order_hour); !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('order_year', 'Group by Year:') !!}
        {!! Form::checkbox('order_year', 'YEAR(hour)', request()->order_year); !!}
    </div>

    <div class="form-group col-sm-3">
        {!! Form::label('order_month', 'Group by Month:') !!}
        {!! Form::checkbox('order_month', 'MONTH(hour)', request()->order_month); !!}
    </div>
    
    <div class="form-group col-sm-3">
        {!! Form::label('order_day', 'Group by Day:') !!}
        {!! Form::checkbox('order_day', 'DAY(hour)', request()->order_day); !!}
    </div>


    @push('scripts')
        <script type="text/javascript">
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                useCurrent: true,
                sideBySide: true
            })
            $('#final_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
                useCurrent: true,
                sideBySide: true
            })
        </script>
    @endpush
    
    <div class="form-group col-sm-12">
        {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}
        <a href="{{ route('transactions.index') }}" class="btn btn-default">Clear Filters</a>
    </div>
{{ Form::close() }}

