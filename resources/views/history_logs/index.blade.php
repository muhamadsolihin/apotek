@extends('layouts.app')

@section('content')
<div class="container-fluid row py-0">
    <div class="col-md-2 p-0">
        @include('_sidebar')
    </div>

    <div class="col-md-10  container py-5">
    <div class="d-flex flex-justify-between">
        <div class="chart ml-5 ms-3 p-2">
        </div>
        <table class="table ms-3 table-bordered table-striped">
        <thead class="table-primary bg-primary">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Action</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyLogs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->user->name }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->timestamp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    </div>
</div>
@endsection
