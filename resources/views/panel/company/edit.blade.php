@extends('layouts.panel')

@section('content')
    <div class="row">
        <div class="col-xs-9">
            @if(count($errors) > 0)
                <div class="alert alert-danger col-xs-10 " >

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
    </div>
    <div class="row">
    <div class="col-xs-9">
    <h1> Company Profile </h1>

    {!! Form::model($model,['method' => 'PATCH', 'route' => ['company.update' , $model->id ]]) !!}
    <div class="form-group">
        {!! Form::label('name',"Name:") !!}
        {!! Form::text('name',$model->name,['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email',"Email:") !!}
        {!! Form::text('email',$model->email,['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('contact',"Contact:") !!}
        {!! Form::text('contact',$model->contact,['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone',"Phone:") !!}
        {!! Form::text('phone',$model->phone,['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update',['class' => "btn btn-primary"]) !!}

    </div>

    {!! Form::close() !!}

    </div>
    </div>



@endsection