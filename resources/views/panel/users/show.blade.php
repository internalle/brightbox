@extends('layouts.panel')

@section('content')

    <div class="row" style="margin-top: 25px;">
        <div class="col-xs-3 pull-left">
            <img height="150" class="img-rounded"
                 src="{{$model->avatar ?  asset('storage/' . $model->avatar) :
                 "https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png"}}">
        </div>
        <div class="col-xs-9">
            <h1>{{$model->name}}</h1>
            <h3>Email:{{$model->email}}</h3>
            <h3>Role:{{$model->role->name}}</h3>
        </div>
    </div>
    <hr>
    <a class="btn btn-danger" href="{{route('users.index')}}" >Go Back</a>



@stop