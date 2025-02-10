@extends('layout')

@section('title')
    Edit
@endsection

@section('style')
    <style>
        .custom-margin {
            margin-top: 100px;
        }
    </style>
@endsection

@section('body')

<div class="container custom-margin">
    <h2>Edit Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">New Password (optional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control">
            @if($user->image)
            <img src="{{ asset($user->image) }}" alt="Profile Image" width="100" class="mt-2">
        @endif

        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

@endsection
