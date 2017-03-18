@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Please choose</div>
                <div class="panel-body">
                   <ul>
                       <li><a class="btn btn-link" href="{{ route('company.index') }}">Join company</a></li>
                       <li><a class="btn btn-link" href="{{ route('company.create') }}">Create company</a></li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
