@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('panel.partials.errors')
                <div class="panel panel-default">
                    <a class="btn btn-danger" style="margin: 15px;" href="{{route('company.choose')}}">Go back</a>
                    <div class="panel-heading"><h1>Create Company Profile</h1></div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => 'company.store', 'method' => 'post')) !!}
                        <div class="form-group">
                            {!! Form::label('name',"Name:") !!}
                            {!! Form::text('name',null,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email',"Email:") !!}
                            {!! Form::email('email',null,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact',"Contact:") !!}
                            {!! Form::text('contact',null,['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone',"Phone:") !!}
                            {!! Form::text('phone',null,['class' => "form-control"]) !!}
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