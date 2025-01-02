@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Polio Worker Details</h1>

    <div class="mb-3">
        <strong>Name:</strong> {{ $worker->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $worker->email }}
    </div>
    <div class="mb-3">
        <strong>Assigned Area:</strong> {{ $worker->assigned_area }}
    </div>

    <a href="{{ route('admin.polio-workers') }}" class="btn btn-primary">Back to Workers List</a>
</div>
@endsection
