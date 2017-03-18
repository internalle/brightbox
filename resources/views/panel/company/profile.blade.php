@extends('layouts.panel')

@section('content')
    <div style="height:700px ; background: url('https://clipartion.com/wp-content/uploads/2015/10/cute-penguin-clipart-free-clip-art-images.png') no-repeat center center">

    @if($company)
        <h1>Welcome to: {{$company->name}} </h1>
        <h4>Contact: {{$company->contact}} </h4>
        <h4>Phone: {{$company->phone}}</h4>
        <h5>Email: {{$company->email}}</h5>

        @can('Admin')
        <a  class="btn btn-warning" href="{{route('company.edit')}}" >Edit Profile</a>
        @endcan

    @endif

    </div>
@endsection