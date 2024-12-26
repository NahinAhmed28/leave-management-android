@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Welcome to Your Dashboard</h3>
                    </div>

                    <div class="card-body text-center py-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>{{ __('You are successfully logged in!') }}</h4>
                        <p class="lead mt-3">
                            Manage your leave requests, view pending approvals, and track your leave history.
                        </p>

                        <div class="mt-5">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                                Go to Dashboard
                            </a>
                            <a href="{{ route('leaves.index') }}" class="btn btn-outline-secondary btn-lg ms-3">
                                View Leave Requests
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
