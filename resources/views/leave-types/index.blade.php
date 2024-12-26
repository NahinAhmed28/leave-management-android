@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Leave Types</h1>
        <a href="{{ route('leave-types.create') }}" class="btn btn-primary mb-3">Add New Leave Type</a>

        <table class="table table-hover shadow">
            <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Max Days</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($leaveTypes as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->max_days }}</td>
                    <td>
                        <a href="{{ route('leave-types.edit', $type) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
