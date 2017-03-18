@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-xs-3 pull-left">
            {{--<img src="{{$user->photo ?  "/" . $user->photo->file : "http://placehold.it/400x400"}}" class="img-responsive img-rounded">--}}

            {{--</img>--}}
        </div>

        <div class="col-xs-12">
            <h1>{{$model->name}} </h1>

            {!! Form::model($model,['method' => 'PATCH', 'route' => 'user.profile.update', 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name',"Full Name:") !!}
                {!! Form::text('name',$model->name,['class' => "form-control"]) !!}
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
                {!! Form::label('avatar',"Avatar:") !!}
                {!! Form::file('avatar',['class' => "form-control"]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit ',['class' => "btn btn-primary"]) !!}

            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        @if(count($errors) > 0)
            <div class="alert alert-danger col-xs-10 pull-right" >

                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection