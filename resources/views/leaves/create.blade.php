@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Request Leave</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('leaves.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="leave_type_id" class="form-label">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id" class="form-select" required>
                    <option value="">Select Leave Type</option>
                    @foreach($leaveTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }} (Max: {{ $type->max_days }} days)</option>
                    @endforeach
                </select>
                @error('leave_type_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
                @error('start_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
                @error('end_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="reason" class="form-label">Reason</label>
                <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
                @error('reason')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit Leave Request</button>
            <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
