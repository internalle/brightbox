@extends('layouts.panel')

@section('content')

    <h1>Employees </h1>
    @can('Admin')
    <a  class="btn btn-success pull-right" href="{{route('users.create')}}" >Add new Employee</a>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            @can('Admin')
            <th>Manage</th>
            <th>Remove</th>
            @endcan
        </tr>
        </thead>
        <tbody>

        @if($models)
            @foreach($models as $user)

                @if($user->id != auth()->user()->id)
                <tr @if($user->role->name == "applicant") style="background: coral;" @endif>
                    <td>{{$user->id}}</td>
                    <td>
                      <a href="{{$user->avatar ?  asset('storage/' . $user->avatar) : "#"}}" /><img height="70" src="{{$user->avatar ?  asset('storage/' . $user->avatar) : "https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png"}}"></a>
                    </td>
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role? $user->role->name : 'no role yet'}}</td>
                    @can('Admin')
                    <td><a class="btn btn-warning" href="{{route("users.edit",$user->id)}}" >Manage</a> </td>
                    <td>
                    {!! Form::open(['method' => 'POST', 'route' => ['users.remove' , $user->id ]])  !!}
                        <div class="form-group">
                            {!! Form::submit('Remove from company',['class' => "btn btn-danger "]) !!}

                        </div>
                    {!! Form::close() !!}
                    </td>
                    @endcan

                </tr>
                @endif
            @endforeach
        @endif


        </tbody>
    </table>
@endsection