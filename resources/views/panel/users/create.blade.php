@extends('layouts.panel')

@section('content')
    @include('panel.partials.errors')

    <h1>Create  </h1>

    {!! Form::open(['method' => 'POST', 'route' => 'users.store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name',"Full Name:") !!}
            {!! Form::text('name',null,['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email',"Email:") !!}
            {!! Form::email('email',null,['class' => "form-control"]) !!}
        </div>


        <div class="form-group">
            {!! Form::label('password',"Password:") !!}
            {!! Form::password('password',['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id',"Role:") !!}
            {!! Form::select('role_id', $roles,['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('file',"File:") !!}
            {!! Form::file('avatar',['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create',['class' => "btn btn-primary"]) !!}

        </div>

    {!! Form::close() !!}
    <a href="{{ URL::previous() }}" class="btn btn-default">Back</a>

@endsection