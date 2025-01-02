@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Polio Workers</h1>
    <a href="{{ route('UnionCouncil.index') }}" class="btn btn-primary mb-3">Back to Union Councils</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Assigned Areas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polioWorkers as $worker)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>
                        {{-- {{dd($worker->unionCouncils)}} --}}
                        @foreach($worker->assigned_area as $area)
                            <span class="badge bg-info">{{ $area->name }}</span>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
