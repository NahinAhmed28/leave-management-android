@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Your Leaves</h1>
        <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Request Leave</a>
        <table class="table">
            <thead>
            <tr>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaves as $leave)
                <tr>
                    <td>{{ $leave->leaveType->name }}</td>
                    <td>{{ $leave->start_date }}</td>
                    <td>{{ $leave->end_date }}</td>
                    <td>{{ $leave->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection