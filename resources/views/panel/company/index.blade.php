@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <a class="btn btn-danger" style="margin: 15px;" href="{{route('company.choose')}}">Go back</a>
               <div class="panel-heading">Choose Companies</div>
               <div class="panel-body">
                  <table class="table">
                     <thead>
                     <tr>
                        <th>Company Name</th>
                        <th>Company Email</th>
                        <th>Commpany Phone</th>
                        <th>Join</th>
                     </tr>
                     </thead>
                     <tbody>

                        @if($models)
                           @foreach($models as $company)
                              <tr>
                                 <td><strong>{{$company->name}}</strong></td>
                                 <td>{{$company->email}}</td>
                                 <td>{{$company->phone}}</td>
                                 <td><a class="btn btn-success" href="{{route('company.join',$company->id)}}" >Apply</a> </td>
                              </tr>
                           @endforeach
                        @endif
                        </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection