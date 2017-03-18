@extends('layouts.panel')

@section('content')

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
@endsection