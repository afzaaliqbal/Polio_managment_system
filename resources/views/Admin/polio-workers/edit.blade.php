@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Polio Worker</h1>
    <a href="{{ route('admin.polio-workers') }}" class="btn btn-primary">Back to Workers List</a>
    <form action="{{ route('admin.polio-worker.update', $worker->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $worker->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $worker->email }}" required>
        </div>
        <div class="mb-3">
            <label for="assigned_area" class="form-label">Assigned Area</label>
            <input type="text" class="form-control" name="assigned_area" id="assigned_area" 
            @foreach($worker->assigned_area as $area)
             value="{{ $area->name }}">
            @endforeach
               
        </div>

        <button type="submit" class="btn btn-warning">Update Polio Worker</button>
    </form>
</div>
@endsection
