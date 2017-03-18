@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-xs-3 pull-left">
            {{--<img src="{{$user->photo ?  "/" . $user->photo->file : "http://placehold.it/400x400"}}" class="img-responsive img-rounded">--}}

            {{--</img>--}}
        </div>

        <div class="col-xs-12">
            <h1>{{$model->name}} </h1>

            {!! Form::model($model,['method' => 'PATCH', 'route' => ['users.update' , $model->id ], 'files' => true]) !!}
            <div class="form-group">
                {!! Form::label('name',"Name:") !!}
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
                {!! Form::label('role_id',"Role:") !!}
                {!! Form::select('role_id', $roles,$model->role->id,['class' => "form-control"]) !!}
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

    <br>
    <img height="150"
         src="{{$model->avatar ?  asset('storage/' . $model->avatar) : "https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png"}}">

    <div class="row">
        @if(count($errors) > 0)
            <div class="alert alert-danger col-xs-10 pull-right">

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