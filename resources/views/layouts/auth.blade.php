@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @yield('header')
                </div>
                <div class="card-body">
                  @yield('body')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection