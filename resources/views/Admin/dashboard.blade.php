@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="mb-4">
        <a href="{{ route('admin.polio-workers') }}" class="btn btn-info">View Polio Workers</a>
        <a href="{{ route('UnionCouncil.index') }}" class="btn btn-info">View union councils</a>
    </div>


    <h2 class="mb-3">Available Polio Workers</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polioWorkers as $worker)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $worker->name }}</td>
                    <td>{{ $worker->email }}</td>
                    <td>
                        @foreach($worker->roles as $role)
                        {{ ucfirst($role->name) }},
                        @endforeach
                     </td>
                    <td>
                        <a href="{{ route('admin.polio-worker.show', $worker->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('admin.polio-worker.edit', $worker->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.polio-worker.destroy', $worker->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this worker?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
