@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <a class="navbar-brand" href="{{ url('/') }}">
    {{ config('app.name', 'Laravel') }}
</a>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" aria-current="page" href="{{url('admin')}}">Halaman Admin</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('rt')}}">Halaman rt</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('umum')}}">Halaman umum</a>
    </li>
</ul>
    </div>
</div>
@endsection
