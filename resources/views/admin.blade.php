@extends('layouts.app')

@section('content')
    <div class="container-fluid row d-flex ">
            <div class="sidebar col-md-2">
                @include('_sidebar') 
            </div>
            <div class="col-md-10 ">
                @include('_dashboard')
            </div>
        </div>
@endsection

<style>
    .content-full{
        padding:0 !important;
    }
</style>
