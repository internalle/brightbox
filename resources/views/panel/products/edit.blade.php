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

    {!! Form::model($model,['method' => 'PATCH', 'route' => ['products.update' , $model->id ]]) !!}
        <div class="form-group">
            {!! Form::label('name',"Name:") !!}
            {!! Form::text('name',$model->name,['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('details',"Details:") !!}
            {!! Form::text('details',$model->details,['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('stock',"Stock:") !!}
            {!! Form::number('stock',$model->stock,['class' => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update',['class' => "btn btn-primary"]) !!}

        </div>

    {!! Form::close() !!}

    </div>
    </div>
    <hr>
    <h2>Product Images</h2><br>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#productImages">Upload image</button>
    <br>
        @if(count($model->images) > 0)
          <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($model->images as $image)
                    <tr>
                        <td>{{$image->id}}</td>
                        <td>
                            <a href="{{$image->name ?  asset('storage/' . $image->name) : "#"}}" /><img height="150" src="{{$image->name ?  asset('storage/' . $image->name) : ""}}"></a>
                        </td>
                        <td>
                            {!! Form::model($model,['method' => 'DELETE', 'route' => ['product.image.destroy' , $image->id ]]) !!}

                            <div class="form-group">
                                {!! Form::submit('Delete',['class' => "btn btn-danger"]) !!}

                            </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach



            </tbody>
            </table>
        @endif

        <!-- Modal -->
        <div id="productImages" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Product name: {{$model->name}}</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::model($model,['method' => 'POST', 'route' => ['product.image.upload' , $model->id ], 'files' => true]) !!}
                                <div class="form-group">
                                    {!! Form::label('name',"Select image:") !!}
                                    {!! Form::file('name',['class' => "form-control"]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::submit('Upload',['class' => "btn btn-primary"]) !!}

                                </div>

                        {!! Form::close() !!}
                     </div>
                </div>

            </div>
        </div>


@endsection