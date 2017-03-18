@extends('layouts.panel')

@section('content')

    <div class="row" style="margin-top: 25px;">
        <div class="col-xs-3 pull-left">
            @if(count($model->images))
                @foreach($model->images as $image)
                    <a href="{{$image->name ?  asset('storage/' . $image->name) : "#"}}" /><img height="150" src="{{$image->name ?  asset('storage/' . $image->name) : ""}}"></a>
                @endforeach

            @else
                <img width="250" src="https://cdn4.iconfinder.com/data/icons/box-and-crates-icons/100/16-512.png" />
            @endif

        </div>

        <div class="col-xs-9">
            <h1>Product name: {{$model->name}}</h1>
          <p>
              {{$model->details}}
          </p>
        </div>
    </div>
    <hr>
    <a class="btn btn-danger" href="{{route('products.index')}}" >Go Back</a>
@stop