@extends('layouts.panel')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" >

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Create Product</h1></div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => 'products.store', 'method' => 'post')) !!}

                        <div class="form-group">
                            {!! Form::label('name',"Name:") !!}
                            {!! Form::text('name',null,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('details',"Details:") !!}
                            {!! Form::text('details',null,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('stock',"Stock:") !!}
                            {!! Form::number('stock',0,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Create',['class' => "btn btn-primary"]) !!}

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection