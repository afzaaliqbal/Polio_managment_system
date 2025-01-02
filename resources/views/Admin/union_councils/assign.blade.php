@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('UnionCouncil.index') }}" class="btn btn-primary mb-3">Back to Union Councils</a>
    <h1 class="mb-4">Assign Polio Workers to Union Council: {{ $unionCouncil->name }}</h1>

    <form action="{{ route('admin.union_council.assign.store', $unionCouncil->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="polio_workers" class="form-label">Select Polio Workers</label>
            <select name="polio_workers[]" id="polio_workers" class="form-select" multiple required>
                @foreach($polioWorkers as $worker)
                    <option value="{{ $worker->id }}">{{ $worker->name }} - {{ $worker->email }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Workers</button>
    </form>
</div>
@endsection
