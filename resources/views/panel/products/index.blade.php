@extends('layouts.panel')

@section('content')

     <h1>Products</h1>
     @can('ManagerOrAdmin')
         <a  class="btn btn-success pull-right" href="{{route('products.create')}}" >Add new Product</a>
     @endcan
     <table class="table">
         <thead>
         <tr>
             <th>ID</th>
             <th>Name</th>
             <th>stock</th>
             <th>Images</th>
             @can('Admin',$company)
             <th>edit</th>
             <th>delete</th>
             @endcan
         </tr>
         </thead>
         <tbody>

         @if($models)
             @foreach($models as $product)
                 <tr>
                     <td>{{$product->id}}</td>
                     <td>@if (Auth::user()->cannot('Applicant'))<a href="{{route('products.show',$product->id)}}" ><strong>{{$product->name}}</strong></a> @endif</td>
                     <td>{{$product->stock}}</td>
                     <td>
                     @if(count($product->images))
                         @foreach($product->images as $image)
                               <a href="{{$product->name ?  asset('storage/' . $image->name) : "#"}}" /><img height="70" src="{{$image->name ?  asset('storage/' . $image->name) : ""}}"></a>

                         @endforeach

                     @else
                          <img width="50" src="https://cdn4.iconfinder.com/data/icons/box-and-crates-icons/100/16-512.png" />
                     @endif

                     </td>
                     @can('ManagerOrAdmin')
                     <td><a class="btn btn-warning" href="{{route("products.edit",$product->id)}}">Edit</a></td>
                     <td>
                         <form method="post" action="{{route("products.destroy",$product->id)}}">
                             <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <input class="btn btn-danger"  type="submit" name="submit" value="Delete">
                         </form>
                     </td>
                     @endcan
                 </tr>
              @endforeach
         @endif


         </tbody>
     </table>
@endsection