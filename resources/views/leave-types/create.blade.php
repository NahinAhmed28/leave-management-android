@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Create New Leave Type</h1>

        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('leave-types.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Leave Type Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_days" class="form-label">Maximum Days Allowed</label>
                        <input type="number" name="max_days" id="max_days" class="form-control" required min="1">
                        @error('max_days')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('leave-types.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Create Leave Type
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
