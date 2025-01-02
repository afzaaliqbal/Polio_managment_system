@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Union Council Details</h1>
    
    <div class="mb-3">
        <strong>Name:</strong> {{ $councils->name }}
    </div>

    <a href="{{ route('UnionCouncil.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
