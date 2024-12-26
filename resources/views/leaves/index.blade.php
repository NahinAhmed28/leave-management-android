@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-4">Leave Requests</h1>

        @if(auth()->user()->role === 'employee')
            <div class="text-end mb-4">
                <a href="{{ route('leaves.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Add New Leave Request
                </a>
            </div>
        @endif

        <table class="table table-hover shadow">
            <thead class="table-dark">
            <tr>
                <th>Employee</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                @if(auth()->user()->role !== 'employee')
                    <th>Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @forelse($leaves as $leave)
                <tr>
                    <td>{{ $leave->user->name }}</td>
                    <td>{{ $leave->leaveType->name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->reason }}</td>
                    <td>
    <span class="badge
      @if($leave->status == 1)
          bg-success
      @elseif($leave->status == 2)
          bg-danger
      @else
          bg-warning
      @endif
    ">
       @if($leave->status == 1)
            Approved
        @elseif($leave->status == 2)
            Rejected
        @else
            Pending
        @endif
    </span>
                    </td>

                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super-admin')
                        <td>
                            <form action="{{ route('leaves.update', $leave->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')

                                <select name="status" class="form-select d-inline w-auto">
                                    <option value="0" {{ $leave->status == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $leave->status == 1 ? 'selected' : '' }}>Approve</option>
                                    <option value="2" {{ $leave->status == 2 ? 'selected' : '' }}>Reject</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>

                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No leave requests found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
