@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5 text-center">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        </div>
    </div>
</div>

@endsection
