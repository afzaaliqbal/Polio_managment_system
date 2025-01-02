@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Union Council</h1>
    <a href="{{ route('UnionCouncil.index') }}" class="btn btn-primary">Back to List</a>
    <form action="{{ route('UnionCouncil.update', $councils->id) }}" method="POST">
        @csrf
        @method('patch')
        
        <div class="mb-3">
            <label for="name" class="form-label">Union Council Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $councils->name }}" required>
        </div>
        <div class="mb-3">
            <label for="tehsil" class="form-label">Select Tehsil</label>
            <select name="tehsil_id" id="tehsil" class="form-control" required>
                <option value="">-- Select a Tehsil --</option>
                @foreach ($tehsils as $tehsil)
                <option value="{{ $tehsil->id }}"@if ($tehsil->id == $councils->tehsil_id) selected @endif>{{ $tehsil->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update Union Council</button>
    </form>
</div>
@endsection
