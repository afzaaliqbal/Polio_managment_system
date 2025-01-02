@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Union Councils</h1>
    <a href="{{ route('UnionCouncil.create') }}" class="btn btn-primary mb-3">Create New Union Council</a>
    <a href="{{ route('admin.polio-workers.index') }}" class="btn btn-primary mb-3">Show assigned Union Councils</a>
    <a href="{{ route('admin.polio-workers') }}" class="btn btn-primary mb-3">View polio Workers</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($councils as $council)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $council->name }}</td>
                    <td>
                        <a href="{{ route('UnionCouncil.show', $council->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('UnionCouncil.edit', $council->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.union_council.assign', $council->id) }}" class="btn btn-warning btn-sm">Assign to worker</a>
                        <form action="{{ route('UnionCouncil.destroy', $council->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this union council?')">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
