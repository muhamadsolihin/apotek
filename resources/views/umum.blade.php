@extends('layouts.app')

@section('content')
    <div class="container-fluid row">
            <div class="col-md-2 p-0">
                @include('_sidebarUser') 
            </div>
            <div class="col-md-10">
                @include('dashboardUmum') 
            </div>
        </div>
@endsection
