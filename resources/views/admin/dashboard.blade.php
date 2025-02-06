@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif

                    <p>Welcome, Admin {{ Auth::user()->first_name }}!</p>
                    <p>You are logged in as an admin.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
