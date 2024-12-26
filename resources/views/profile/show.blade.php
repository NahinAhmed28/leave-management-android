@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Profile</h1>

        <div class="card">
            <div class="card-body">
                <h4>Name: {{ $user->name }}</h4>
                <p>Email: {{ $user->email }}</p>
                <p>Role: {{ ucfirst($user->role) }}</p>
            </div>
        </div>
    </div>
@endsection
