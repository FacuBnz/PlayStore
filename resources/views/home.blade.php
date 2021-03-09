@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty(Auth::user()) && Auth::user()->role == 'ADMIN')
        <h1 class="mb-5 text-center">My Apps</h1>
    @endif
    <div class="row justify-content-center mb-5">
        @if(!empty(Auth::user()) && Auth::user()->role == 'ADMIN')
            @include('includes.admin_home')
        @elseif( empty(Auth::user()) || (Auth::user()->role == 'USER' || Auth::user()->role == null))
            @include('includes.client_home')
        @endif
    </div>
    <div class="row justify-content-center">
        <p>{{ $apps->links() }}</p>
    </div>
</div>
@endsection
