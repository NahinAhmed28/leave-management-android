@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Edit Leave Type</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('leave-types.update', $leaveType->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Leave Type Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ old('name', $leaveType->name) }}" required>
                        @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description (optional)</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $leaveType->description) }}</textarea>
                        @error('description')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="max_days" class="form-label">Maximum Days Allowed</label>
                        <input type="number" name="max_days" id="max_days" class="form-control"
                               value="{{ old('max_days', $leaveType->max_days) }}" required min="1">
                        @error('max_days')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('leave-types.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Update Leave Type
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
