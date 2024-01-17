@extends('layouts.app')

@section('content')
    <div class="container-fluid row">
            <div class="col-md-2 p-0">
                @include('_sidebarUser') <!-- Include the sidebar -->
            </div>
            <div class="col-md-10">
                @include('_dashboard') <!-- Include the dashboard content -->
            </div>
        </div>
@endsection
