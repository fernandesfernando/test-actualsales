@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Deal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deal, ['route' => ['deals.update', $deal->id], 'method' => 'patch']) !!}

                        @include('deals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection